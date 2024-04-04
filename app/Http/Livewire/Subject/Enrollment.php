<?php

namespace App\Http\Livewire\Subject;

use App\Models\Active_SchoolYearAndSem;
use App\Models\SMS\StudentSubject;
use App\Models\SMS\Subject;
use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Str;

class Enrollment extends Component
{
    public $students;
    public $student_id;
    public $schedules;
    public $transactions;

    public $student;
    public $image;
    public $student_number;
    public $student_lrn;
    public $name;
    public $strand;
    public $program;
    public $school_year;
    public $grade_level;
    public $semester;
    public $date_enrolled;
    public $total_tuition_fee;
    public $total_other_fees;
    public $total;

    public function mount()
    {
        $this->schedules = collect();
        $this->transactions = collect();
        // dd(getCurrentSettings());
        $this->school_year =  getCurrentSettings();
        $this->students = getStudentsByStatus(1);
    }

    public function updatedStudentId($value)
    {
        if ($value) {
            $student = Student::find($value);
            $enrollment = getStudentEnrollment($student->id);
            $schedules = getSchedulesUsingSection($enrollment->section_id);
            if (!checkIfStudentPayRegistrationFee($student->transactions())) {
                return session()->flash('error', 'The student has not yet paid the registration fee.');
            }
            if ($enrollment->section_id == null) {
                return session()->flash('error', 'The student has no section');
            }
            if (!$schedules) {
                return session()->flash('error', 'The student has no schedules');
            }

            $this->image = $student->image;
            $this->student_number = $student->std_num;
            $this->student_lrn = $student->lrn;
            $this->name = $student->full_name_family_name_first;
            $this->strand = $enrollment->specialization->strand->strand;
            $this->program = $enrollment->specialization->specialization;
            $this->grade_level = $enrollment->grade_level->grade_level;
            $this->semester = $enrollment->sem->sem;
            $this->date_enrolled = $enrollment->created_at;
            $this->total_tuition_fee = getFeeByType('tuition')->amount;

            $transaction = $student
                ->transactions()
                ->where('school_year_id', $this->school_year['school_year_id'])
                ->first();
            $this->transactions = $transaction->transactions;
            $this->total_other_fees = $this->getTotalTransactions($transaction->transactions);
            $this->total = $this->total_tuition_fee + $this->total_other_fees;

            $this->schedules = $schedules;
            $this->student = $student;
        }
    }
    private function getTotalTransactions($transactions)
    {
        $total = 0;
        foreach ($transactions as $key => $transaction) {
            $total = $total + $transaction->fee_amount;
        }
        return $total;
    }

    public function generatePDF()
    {

        if (!$this->student_id) {
            return session()->flash('error', 'Select Student First.');
        }
        // Define the filename variable
        $filename = toLetter($this->student->first_name) . '_' . Str::lower($this->student->last_name) . '_certificate_of_matriculation';

        // Dispatch the browser event with the filename as data
        $this->dispatchBrowserEvent('generatePDF', ['filename' => $filename]);
    }

    public function render()
    {
        return view('livewire.subject.enrollment');
    }
}
