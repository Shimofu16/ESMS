<?php

namespace App\Http\Controllers\SMS;

use App\Helpers\Activity;
use App\Http\Controllers\Controller;
use App\Models\Active_SchoolYearAndSem;
use App\Models\Sem;
use App\Models\SMS\StudentSubject;
use App\Models\SMS\Subject;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollStudentSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($student_id)
    {
        $student = Student::find($student_id);
        return view('pages.StudentRecord.EnrolledStudents.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $student_id)
    {
        try {
            $active = Active_SchoolYearAndSem::first();

            $student = Student::findOrFail($student_id);

            if ($student->enrollment->section_id == null) {
                return redirect()->back()->with('toast_error', 'Student has no section. Please assign section first.');
            }

            $schedules = $student->enrollment->section->schedules;
            $section = $student->enrollment->section;

            if ($schedules->count() == 0) {
                return redirect()->back()->with('toast_error', 'Student section has no schedules. Please assign schedule first.');
            }

            $studentSubjects = StudentSubject::where('student_id', $student_id)
                ->where('semester_id', $active->active_sem_id)
                ->where('sy_id', $active->active_SY_id)
                ->get();

            if ($studentSubjects->count() > 0) {
                return redirect()->back()->with('toast_error', 'Student already enrolled in this semester and school year');
            }

            $specialization = $student->enrollment->specialization;
            $gradeLevel = $student->enrollment->grade_level;


            if ($request->has('completed_subjects')) {
                $completed_subjects = $request->completed_subjects;
                foreach ($completed_subjects as $key => $completed_subject) {
                    $subjects[] = [
                        'subject_id' => $completed_subject,
                        'status' => 'Completed'
                    ];
                }
            }
            if ($request->has('enroll_subjects')) {
                $enroll_subjects = $request->enroll_subjects;
                foreach ($enroll_subjects as $key => $enroll_subject) {
                    $subjects[] = [
                        'subject_id' => $enroll_subject,
                        'status' => 'To Enroll'
                    ];
                }
            }

            foreach ($subjects as $subject) {
                    StudentSubject::create([
                        'student_id' => $student_id,
                        'subject_id' => $subject['subject_id'],
                        'status' => $subject['status'],
                        'semester_id' => $active->active_sem_id,
                        'sy_id' => $active->active_SY_id
                    ]);
                    if ($subject['status'] == 'To Enroll') {
                        $subjectIds[] = $subject['subject_id']; 
                    }
            }


            $coreSubjects = Subject::where('type', 'Core')
                ->where('grade_level_id', $gradeLevel->id)
                ->where('specialization_id', $specialization->id)
                ->where('semester_id', $active->active_sem_id)
                ->whereIn('id', $subjectIds)
                ->get();

            $appliedSubjects = Subject::where('type', 'Applied and Specialized Subjects')
                ->where('grade_level_id', $gradeLevel->id)
                ->where('specialization_id', $specialization->id)
                ->where('semester_id', $active->active_sem_id)
                ->whereIn('id', $subjectIds)
                ->get();
            $semester = (Sem::find($active->active_sem_id)->sem == 1) ? 'First ' : 'Second ';
            $semester = $semester . 'Semester';
            $name = $student->full_name;

            Activity::log(auth()->user()->id, 'Enrolled Student`s Subject', 'Enrolled Student ' . $name);

            return view('pages.SMS.Exports.subjects', compact('student', 'specialization', 'gradeLevel', 'semester', 'coreSubjects', 'appliedSubjects', 'schedules', 'section'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('toast_error', $th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
