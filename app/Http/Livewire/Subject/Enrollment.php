<?php

namespace App\Http\Livewire\Subject;

use App\Models\Active_SchoolYearAndSem;
use App\Models\SMS\StudentSubject;
use App\Models\SMS\Subject;
use App\Models\Student;
use Livewire\Component;

class Enrollment extends Component
{
    public $students;
    public $student_id;

    public $schedules;
    public $school_year;

    public function mount()
    {
        $this->schedules = collect();
        // dd(getCurrentSettings());
        $this->school_year =  getCurrentSettings();
        $this->students = getStudentsByStatus(0);
    }

    public function updatedStudentId($value)
    {
        if ($value) {
            $student = Student::find($value);
            if (checkIfStudentPayRegistrationFee($student->transactions)) {
            }
            return session()->flash('error', 'The student has not yet paid the registration fee.');
        }
    }
    public function save()
    {
    }

    public function render()
    {
        return view('livewire.subject.enrollment');
    }
}
