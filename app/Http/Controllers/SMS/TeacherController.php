<?php

namespace App\Http\Controllers\SMS;

use App\Helpers\Activity;
use App\Http\Controllers\Controller;
use App\Models\Active_SchoolYearAndSem;
use App\Models\SMS\Teacher;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Storage;

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
        return view('pages.SMS.Teachers.create');
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
            $request->validate([
                'picture' => 'required|file',
                'first_name' => 'required|string',
                'middle_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required',
                'sex' => 'required',
                'address' => 'required|string',
                'phone_number' => 'required',
                'birthday' => 'required|date',
                'civil_status' => 'required',
                'height' => 'required|string',
                'weight' => 'required|string',
                'nationality' => 'required|string',
                'occupation' => 'required|string',
            ]);
            // dd($request->all());
            $file_name = md5($request->picture . microtime()) . '.' . $request->picture->extension();
            $request->picture->storeAs('public/photos', $file_name);

            Teacher::create([
                'picture' => $file_name,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'sex' => $request->sex,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'birthday' => $request->birthday,
                'civil_status' => $request->civil_status,
                'height' => $request->height,
                'weight' => $request->weight,
                'nationality' => $request->nationality,
                'occupation' => $request->occupation,
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
    public function show($id, $type)
    {
        $teacher = Teacher::find($id);
        if ($type == 'schedules') {
            $setting = getCurrentSettings();

            $schedules = $teacher->schedules()
                ->where('school_year_id', $setting['school_year_id'])
                ->where('semester_id', $setting['semester_id'])
                // ->orderBy('id', 'DESC')
                ->get();
            // dd($schedules->first());
            return view('pages.SMS.Teachers.show', compact('teacher', 'schedules', 'setting', 'type'));
        } else {
            return view('pages.SMS.Teachers.show', compact('teacher', 'type'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.SMS.Teachers.edit', [
            'teacher' => Teacher::find($id)
        ]);
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
            $request->validate([
                'first_name' => 'required|string',
                'middle_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required',
                'sex' => 'required',
                'address' => 'required|string',
                'phone_number' => 'required',
                'birthday' => 'required|date',
                'civil_status' => 'required',
                'height' => 'required|string',
                'weight' => 'required|string',
                'nationality' => 'required|string',
                'occupation' => 'required|string',
            ]);
            $teacher = Teacher::findOrFail($id);
            $file_name = '';
            if ($request->has('picture')) {
                Storage::delete(storage_path('public/photos/', $teacher->picture));
                $file_name = md5($request->picture . microtime()) . '.' . $request->picture->extension();
                $request->picture->storeAs('public/photos', $file_name);
            }
            $teacher->update([
                'picture' => $file_name,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'sex' => $request->sex,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'birthday' => $request->birthday,
                'civil_status' => $request->civil_status,
                'height' => $request->height,
                'weight' => $request->weight,
                'nationality' => $request->nationality,
                'occupation' => $request->occupation,
            ]);
            Activity::log(auth()->user()->id, 'Teacher Management', 'Updated Teacher ' . $teacher->full_name);
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
            Activity::log(auth()->user()->id, 'Teacher Management', 'Deleted Teacher ' . $teacher->full_name);
            return back()->with('toast_success', 'Teacher Resigned Successfully');
        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
        }
    }
}
