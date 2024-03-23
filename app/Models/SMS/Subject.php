<?php

namespace App\Models\SMS;

use App\Models\GradeLevel;
use App\Models\Sem;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $guarded = [];

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function semester()
    {
        return $this->belongsTo(Sem::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'subject_id');
    }
}
