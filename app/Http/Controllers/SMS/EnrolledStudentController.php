<?php

namespace App\Http\Controllers\SMS;

use App\Helpers\Activity;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EnrolledStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($student_type = '')
    {
        // dd(getStudentsByStatus(0, $student_type));
        return view('pages.SMS.students.enrolled.index',[
            'students' => getStudentsByStatus(1, $student_type),
            'student_type' => $student_type
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $student_id)
    {
        return view('pages.SMS.students.enrolled.show', [
            'student' => Student::with('enrollment.student', 'document')->where('id', $student_id)->first()
        ]);
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
    public function destroy(Request $request, $id)
    {
        $student =    Student::find($id);
        $student->update([
            'status' => 2,
            'reason_for_dropout' => $request->reason_for_dropout,
            'dropout_date' =>  Carbon::now(),
        ]);

        Activity::log(auth()->user()->id, 'Student Management', 'Dropped Student ' . $student->full_name);
        return redirect()->route('students.enrolled.index')->with('toast_success', 'Added Successfully');
    }
}
