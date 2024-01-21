<?php

namespace App\Models;

use App\Models\SMS\StudentSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [''];

    // full name attribute
    protected $appends = ['full_name'];

    public function memos()
    {
        return $this->hasMany(Memo::class);
    }

    public function document()
    {
        return $this->hasOne(Document::class);
    }

    public function enrollment()
    {
        return $this->belongsTo(Student_Specialization_GradeLevel_SchoolYear::class, 'enrollment_id', 'id');
    }

    public function billings()
    {
        return $this->hasMany(Billing::class, 'std_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'std_id', 'id');
    }
    public function subjects()
    {
        return $this->hasMany(StudentSubject::class);
    }

    // get full name of student
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }
}
