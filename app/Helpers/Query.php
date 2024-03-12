


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
        $setting->school_year = $active->schoolyear->school_year;

        return $setting;
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
