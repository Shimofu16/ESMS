<?php

namespace App\Http\Controllers\SMS;

use App\Helpers\Activity;
use App\Http\Controllers\Controller;
use App\Models\SMS\Teacher;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::where('isResigned', 0)->get();
        return view('pages.SMS.Teachers.index', compact('teachers'));
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
        try {
            Teacher::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'age' => $request->age,
                'contact' => $request->contact,
                'email' => $request->email,
            ]);
            Activity::log(auth()->user()->id, 'Teacher Management', 'Added Teacher ' . $request->name);
            return back()->with('toast_success', 'Teacher Added Successfully');
        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
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
        $teacher = Teacher::find($id);
        $schedules = $teacher->schedules;
        return view('pages.SMS.Teachers.show', compact('teacher', 'schedules'));
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
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'age' => $request->age,
                'contact' => $request->contact,
                'email' => $request->email,
            ]);
            Activity::log(auth()->user()->id, 'Teacher Management', 'Updated Teacher ' . $teacher->name);
            return back()->with('toast_success', 'Teacher Updated Successfully');
        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->update([
                'isResigned' => 1,
            ]);
            Activity::log(auth()->user()->id, 'Teacher Management', 'Deleted Teacher ' . $teacher->name);
            return back()->with('toast_success', 'Teacher Resigned Successfully');
        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
        }
    }
}
