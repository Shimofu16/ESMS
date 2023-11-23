<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Specialization_GradeLevel_SchoolYear extends Model
{
    use HasFactory;

    protected $table = "std_spc_gl_sy";
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function grade_level()
    {
        return $this->belongsTo(GradeLevel::class, 'gradelevel_id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function schoolyear()
    {
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }

    public function sem()
    {
        return $this->belongsTo(Sem::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
