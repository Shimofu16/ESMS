


<?php

use App\Models\Active_SchoolYearAndSem;
use App\Models\SMS\Fee;
use App\Models\Student;

if (!function_exists('getCurrentSettings')) {
     function getCurrentSettings()
    {
        $active = Active_SchoolYearAndSem::find(1);
        $setting = (object) collect($active)->map(function ($value, $key) {
            $newKey = $key;
    
            // Rename keys as required
            if ($key === "active_SY_id") {
                $newKey = "school_year_id";
            } elseif ($key === "active_sem_id") {
                $newKey = "semester_id";
            }
    
            return [$newKey => $value];
        })->collapse()->all();
    
        // Set school_year as string
        $setting->school_year = $active->schoolyear->school_year;
    
        // Convert the entire object to an array
        $settingArray = json_decode(json_encode($setting), true);
    
        return $settingArray;
    }
    
}
if (!function_exists('getStudentsByStatus')) {
    function getStudentsByStatus(int $status)
    {
        $active = Active_SchoolYearAndSem::first();
        return Student::with('enrollment.student')
            ->whereHas('enrollment', function ($query) use ($active) {
                return $query->where('school_year_id', '=', $active->active_SY_id)->where('sem_id', '=', $active->active_sem_id);
            })
            ->where('status', $status)
            ->get();
    }
}
if (!function_exists('getFeeByType')) {
    function getFeeByType(string $type)
    {
        return Fee::where('type', $type)->first();
    }
}
if (!function_exists('getFeeTypes')) {
    function getFeeTypes()
    {
        return ['tuition', 'registration', 'miscellaneous', 'activity', 'other'];
    }
}
if (!function_exists('getTotalFeeAmount')) {
    function getTotalFeeAmount($transactions)
    {
        $total = 0;
        foreach ($transactions as $key => $transaction) {
            $total = $total + $transaction->fee_amount;
        }
        return $total;
    }
}
if (!function_exists('getTotalBalance')) {
    function getTotalBalance($transactions)
    {
        $total = 0;
        foreach ($transactions as $key => $transaction) {
            if ($transaction->balances->count() > 0) {
                $latest_balance = $transaction->balances()->latest()->first();
                if ($latest_balance->balance != 0) {
                    $total = $total + $latest_balance->balance;
                }
            }
        }
        return $total;
    }
}
if (!function_exists('checkIfStudentPayRegistrationFee')) {
    function checkIfStudentPayRegistrationFee($payment_transactions)
    {
        $school_year = getCurrentSettings();
        $payment_transactions = $payment_transactions->where('school_year_id', $school_year->school_year_id)->get();
        foreach ($payment_transactions as $key => $payment_transaction) {
            $registration_fee = $payment_transaction->transactions()->where('type', 'registration')->first();
            if ($registration_fee) {
                return true;
            }
        }
        return false;
    }
}
