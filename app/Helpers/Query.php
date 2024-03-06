


<?php

use App\Models\Active_SchoolYearAndSem;

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
