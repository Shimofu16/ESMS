<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Active_SchoolYearAndSem extends Model
{
    use HasFactory;

    protected $guarded = [''];


    public function schoolyear(){
        return $this->belongsTo(SchoolYear::class, 'active_SY_id');
    }

    public function sem(){
        return $this->belongsTo(Sem::class, 'active_sem_id');
    }
}
