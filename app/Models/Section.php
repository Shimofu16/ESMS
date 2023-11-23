<?php

namespace App\Models;

use App\Models\SMS\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = "sections";
    protected $guarded = [];

    public function specialization()
    {

        return $this->belongsTo(Specialization::class);
    }

    public function gradelevel()
    {

        return $this->belongsTo(GradeLevel::class);
    }

    public function schedules()
    {

        return $this->hasMany(Schedule::class, 'section_id', 'id');
    }

    public function students()
    {

        return $this->hasMany(Student_Specialization_GradeLevel_SchoolYear::class, 'section_id', 'id');
    }
}
