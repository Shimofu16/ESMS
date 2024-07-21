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
    public $subjects;
    public $subject_id;
    public $selected_subjects;
    public $schedules;
    public $transactions;
    public bool $isRegular = false;

    public $enrollment;
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
        $this->selected_subjects = [];
        $this->schedules = collect();
        $this->transactions = collect();
        // dd(getCurrentSettings());
        $this->school_year =  getCurrentSettings();
        $this->students = getStudentsByStatus(1);
        if (count($this->students) == 0) {
            return session()->flash('error', 'No Enrolled Students');
        }
    }

    public function updatedStudentId($value)
    {

        if ($value) {
            $this->isRegular = false;
            $this->schedules = collect();
            $student = Student::where('std_num' ,$value)->first();
            $this->enrollment = getStudentEnrollment($student->id);
            if ($this->enrollment->section_id == null) {
                return session()->flash('error', 'The student has no section');
            }
            $schedules = getSchedulesUsingSection($this->enrollment->section_id);
            if (!checkIfStudentPayRegistrationFee($student->transactions())) {
                return session()->flash('error', 'The student has not yet paid the registration fee.');
            }

            // if (!$schedules) {
            //     return session()->flash('error', 'The student has no schedules');
            // }

            $this->image = $student->image;
            $this->student_number = $student->std_num;
            $this->student_lrn = $student->lrn;
            $this->name = $student->full_name_family_name_first;
            $this->strand = $this->enrollment->specialization->strand->strand;
            $this->program = $this->enrollment->specialization->specialization;
            $this->grade_level = $this->enrollment->grade_level->grade_level;
            $this->semester = $this->enrollment->sem->sem;
            $this->date_enrolled = $this->enrollment->created_at;
            $this->total_tuition_fee = getFeeByType('tuition')->amount;

            $student_transaction = $student
                ->transactions()
                ->where('school_year_id', $this->school_year['school_year_id'])
                ->first();
            $this->transactions = $student_transaction->transactions;
            $this->total_other_fees = $this->getTotalTransactions($student->transactions);
            $this->total = $this->total_tuition_fee + $this->total_other_fees;

            $this->selected_subjects = [];
            $this->student = $student;
            if ($student->type == 'Regular') {
                $this->isRegular = true;
                $subjects = Subject::where('specialization_id', $this->enrollment->specialization_id)
                ->where('grade_level_id', $this->enrollment->gradelevel_id)
                ->where('semester_id', $this->semester)
                ->pluck('id')
                ->toArray();
                // $this->schedules =   getSchedulesUsingSection($this->enrollment->section_id, $subjects);
            } else {
                $this->subjects = Subject::where('specialization_id', $this->enrollment->specialization_id)
                    ->where('grade_level_id', $this->enrollment->gradelevel_id)
                    ->where('semester_id', $this->semester)
                    ->get();
            }

            // dd($this->subjects, $this->enrollment);
        }
    }
    // public function updatedSubjectId($value)
    // {
    //     if ($value) {
    //         $this->selected_subjects[$value] = $value;
    //         $this->schedules =   getSchedulesUsingSection($this->enrollment->section_id,  $this->selected_subjects);
    //         if (count( $this->selected_subjects) == count($this->schedules)) {
    //             $this->subjects = Subject::where('specialization_id', $this->enrollment->specialization_id)
    //                 ->whereNotIn('id',  $this->selected_subjects)
    //                 ->where('grade_level_id', $this->enrollment->gradelevel_id)
    //                 ->where('semester_id', $this->semester)
    //                 ->get();
    //         }
    //     }
    // }
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
