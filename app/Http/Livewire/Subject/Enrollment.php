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
    public $selected_student;
    public $specialization;
    public $semester;
    public $gradeLevel;
    public $coreSubjects;
    public $appliedSubjects;
    public $selected_subjects;
    public $section;
    public $hasError;
    public $schedules;

    public function mount()
    {
        $this->coreSubjects = collect();
        $this->appliedSubjects = collect();
        $this->schedules = collect();

        $active = Active_SchoolYearAndSem::first();
        $this->students = Student::with('enrollment')
            ->whereDoesntHave('subjects', function ($q) use ($active) {
                $q->where('sy_id', $active->active_SY_id);
            })
            ->whereHas('enrollment', function ($query) use ($active) {
                $query->where('school_year_id', $active->active_SY_id);
            })
            ->get();
    }

    public function updatedStudentId($value)
    {
        $this->resetErrorBag();
        $student = Student::find($value);
        $this->coreSubjects = collect();
        $this->appliedSubjects = collect();
        $this->schedules = collect();
        $this->hasError = false;
        if ($student->enrollment->section_id == null) {
            $this->addError('section', 'Student has no section. Please assign section first.');
            $this->hasError = true;
        }

        $active = Active_SchoolYearAndSem::first();

        if (!empty($student->enrollment->section->schedules) && count($student->enrollment->section->schedules) === 0) {
            $this->addError('schedule', 'Student section has no schedules. Please assign schedule first.');
            $this->hasError = true;
            $this->schedules = $student->enrollment->section->schedules;
        }

        $studentSubjects = StudentSubject::where('student_id', $student->student_id)
            ->where('semester_id', $student->enrollment->sem_id)
            ->where('sy_id', $active->active_SY_id)
            ->get();

        if ($studentSubjects->count() > 0) {
            $this->addError('subjects', 'Student already enrolled in this semester and school year.');
            $this->hasError = true;
        }
        if (!$this->hasError) {
            $specialization_id = $student->enrollment->specialization_id;
            $this->specialization = $student->enrollment->specialization;
            $this->gradeLevel = $student->enrollment->grade_level;
            $grade_level_id = $student->enrollment->gradelevel_id;
            $this->schedules = $student->enrollment->section->schedules;
            $this->selected_subjects = Subject::with('gradeLevel')->where('grade_level_id', $grade_level_id)
                ->where('specialization_id', $specialization_id)
                ->where('semester_id', $student->enrollment->sem_id)
                ->get();
            $this->coreSubjects = Subject::with('gradeLevel')->where('grade_level_id', $grade_level_id)
                ->where('specialization_id', $specialization_id)
                ->where('type', 'Core')
                ->where('semester_id', $student->enrollment->sem_id)
                ->get();
            $this->appliedSubjects = Subject::with('gradeLevel')->where('grade_level_id', $grade_level_id)
                ->where('specialization_id', $specialization_id)
                ->where('type', 'Applied and Specialized Subjects')
                ->where('semester_id', $student->enrollment->sem_id)
                ->get();
            $this->semester = ($student->enrollment->sem_id ==  1) ? 'First Semester' : 'Second Semester';
            $this->selected_student = $student;
        }
    }
    public function save()
    {
        $this->resetErrorBag();
        $active = Active_SchoolYearAndSem::first();
        $studentSubjects = StudentSubject::where('student_id', $this->selected_student->student_id)
            ->where('semester_id', $this->selected_student->enrollment->sem_id)
            ->where('sy_id', $active->active_SY_id)
            ->get();
        if ($studentSubjects->count() > 0) {
            $this->addError('subjects', 'Student already enrolled in this semester and school year.');
            $this->hasError = true;
        }
        if (!$this->hasError) {
            foreach ($this->selected_subjects as $key => $selected_subject) {
                StudentSubject::create([
                    'student_id' => $this->selected_student->id,
                    'subject_id' => $selected_subject->id,
                    'status' => 'To Enroll',
                    'semester_id' => $active->active_sem_id,
                    'sy_id' => $active->active_SY_id
                ]);
            }
            $this->students = Student::with('enrollment')
                ->whereDoesntHave('subjects', function ($q) use ($active) {
                    $q->where('sy_id', $active->active_SY_id);
                })
                ->whereHas('enrollment', function ($query) use ($active) {
                    $query->where('school_year_id', $active->active_SY_id);
                })
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.subject.enrollment');
    }
}
