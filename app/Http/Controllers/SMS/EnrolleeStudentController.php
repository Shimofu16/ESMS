<?php

namespace App\Http\Controllers\SMS;

use App\Helpers\Activity;
use App\Http\Controllers\Controller;
use App\Imports\ImportEnrollee;
use App\Models\Student;
use Illuminate\Http\Request;
use File;
use Maatwebsite\Excel\Facades\Excel;

class EnrolleeStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(public_path('sample-images\student-sample-1.jpg'));
        // dd(Storage::get(public_path('sample-images/student-sample-1.jpg')));
        return view('pages.SMS.students.enrollees.index',[
            'students' => getStudentsByStatus(0)
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
    public function store(Request $request, $student_id)
    {

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
    public function destroy($student_id)
    {
        try {
            $student = Student::find($student_id);
            Activity::log(auth()->user()->id, 'Student Management', 'Delete student ' . $student->full_name);
            if ($student->transactions()->count() > 0) {
                return back()->with('info', 'Student has transactions');
            }

            $student->enrollment()->delete();
            $student->delete();
            return back()->with('toast_success', 'Student deleted Successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function import(Request $request)
    {
        // dd($request);
        $request->validate(['file' => ['required','mimes:xlsx,xls,csv','max:2048']]);
        Excel::import(new ImportEnrollee, $request->file('file'));
    }
}
