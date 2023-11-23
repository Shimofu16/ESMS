<?php

namespace App\Helpers;

use App\Models\Activity as ActivityLog;

class Activity
{
    public static function log($user_id,$subject,$description)
    {
        ActivityLog::create([
            'user_id' => $user_id,
            'subject' => $subject,
            'description' => $description,
        ]);

    }
}
