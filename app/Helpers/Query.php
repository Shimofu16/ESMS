


<?php

use App\Models\Active_SchoolYearAndSem;
use App\Models\Section;
use App\Models\SMS\Fee;
use App\Models\SMS\Schedule;
use App\Models\Student;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;


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
    function getStudentsByStatus(int $status, string $student_type = '')
    {
        $setting = getCurrentSettings();
        if ($student_type) {
            return Student::with('enrollment.student')
            ->whereHas('enrollment', function ($query) use ($setting) {
                return $query->where('school_year_id', '=', $setting['school_year_id'])->where('sem_id', '=', $setting['semester_id']);
            })
            ->where('status', '=', $status)
            ->where('type', '=', $student_type)
            ->get();
        }
        return Student::with('enrollment.student')
            ->whereHas('enrollment', function ($query) use ($setting) {
                return $query->where('school_year_id', '=', $setting['school_year_id'])->where('sem_id', '=', $setting['semester_id']);
            })
            ->where('status', $status)
            ->get();
    }
}
if (!function_exists('getStudentEnrollment')) {
    function getStudentEnrollment(int $student_id)
    {
        $setting = getCurrentSettings();
        return Student_Specialization_GradeLevel_SchoolYear::where('student_id', $student_id)
            ->where('school_year_id', $setting['school_year_id'])
            ->where('sem_id', '=', $setting['semester_id'])
            ->first();
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
        $setting = getCurrentSettings();
        $payment_transactions = $payment_transactions->where('school_year_id', $setting['school_year_id'])->get();
        foreach ($payment_transactions as $key => $payment_transaction) {
            $registration_fee = $payment_transaction->transactions()->where('type', 'registration')->first();
            if ($registration_fee) {
                return true;
            }
        }
        return false;
    }
}
if (!function_exists('checkIfStudentHasTuitionFee')) {
    function checkIfStudentHasTuitionFee($payment_transactions)
    {
        foreach ($payment_transactions as $key => $payment_transaction) {
            $tuition_fee = $payment_transaction->transactions()->where('type', 'tuition')->first();
            if ($tuition_fee) {
                return true;
            }
        }
        return false;
    }
}
if (!function_exists('checkIfStudentHasBalance')) {
    function checkIfStudentHasBalance($transaction)
    {
        if ($transaction) {
            $latest_balance = $transaction->balances()->latest()->first();
            if ($latest_balance) {
                return true;
            }
        }
        return false;
    }
}
if (!function_exists('getTotalAmountPayed')) {
    function getTotalAmountPayed($transaction)
    {
        $total_balance = 0;
        $total_amount = 0;
        foreach ($transaction->balances as $key => $balance) {
            $total_balance = $total_balance + $balance->balance;
            $total_amount = $total_amount + $balance->amount;
        }
        // dd($transaction->balances());
        return [
            'total_balance' => $total_balance,
            'total_amount' => $total_amount,
        ];
    }
}
if (!function_exists('getLatestBalance')) {
    function getLatestBalance($transaction)
    {
        return $transaction->balances()->latest()->first();
    }
}
if (!function_exists('getFirstBalance')) {
    function getFirstBalance($transaction, $column)
    {
        $balance = $transaction->balances()->first();

        if ($balance) {
            return $balance->$column;
        }

        return null; // or return a default value if needed
    }
}
if (!function_exists('getBalanceByDate')) {
    function getBalanceByDate($transaction, $date, $column)
    {
        $balance = $transaction->balances()->whereDate('created_at', $date)->first();

        if ($balance) {
            return $balance->$column;
        }

        return null; // or return a default value if needed
    }
}
if (!function_exists('getTransaction')) {
    function getTransaction($transaction, $date, $column)
    {
        $balance = $transaction->balances()->whereDate('created_at', $date)->first();

        if ($balance) {
            return $balance->$column;
        }

        return null; // or return a default value if needed
    }
}

if (!function_exists('getSchedulesUsingSection')) {
    function getSchedulesUsingSection($section_id, ?array $subject_ids =null)
    {
        $setting = getCurrentSettings();
        if ($subject_ids) {
            return  Schedule::with('section')
                ->where('section_id', $section_id)
                ->whereIn('subject_id', $subject_ids)
                ->where('school_year_id', $setting['school_year_id'])
                ->where('semester_id', $setting['semester_id'])
                ->get();
        }
        return  Schedule::with('section')
            ->where('section_id', $section_id)
            ->where('school_year_id', $setting['school_year_id'])
            ->where('semester_id', $setting['semester_id'])
            ->get();
    }
}
