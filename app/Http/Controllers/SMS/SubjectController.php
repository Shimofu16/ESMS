<?php

namespace App\Http\Controllers\SMS;

use App\Helpers\Activity;
use App\Http\Controllers\Controller;
use App\Models\GradeLevel;
use App\Models\SMS\Subject;
use App\Models\Specialization;
use App\Models\Sem as Semester;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($grade_level_id, $specialization_id = null)
    {
        $firstSemSubjects = Subject::query()
            ->with('gradeLevel', 'specialization')
            ->where('semester_id', 1)
            ->where('grade_level_id', $grade_level_id);
        $secondSemSubjects = Subject::query()
            ->with('gradeLevel', 'specialization')
            ->where('semester_id', 2)
            ->where('grade_level_id', $grade_level_id);
        if ($specialization_id) {
            $firstSemSubjects = $firstSemSubjects->where('specialization_id', $specialization_id);
            $secondSemSubjects = $secondSemSubjects->where('specialization_id', $specialization_id);
        }

        $firstSemSubjects = $firstSemSubjects->get();
        $secondSemSubjects = $secondSemSubjects->get();

        return view('pages.SMS.Subjects.index', [
            'firstSemSubjects' => $firstSemSubjects,
            'secondSemSubjects' => $secondSemSubjects,
            'grade_level_id' => $grade_level_id,
            'specialization_id' => $specialization_id,
            'gradeLevels' => GradeLevel::all(),
            'specializations' => Specialization::all(),
            'semesters' => Semester::all(),
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
        try {
            $request->validate([
                'code' => 'required',
                'name' => 'required',
                'type' => 'required',
                'unit' => 'required',
                'grade_level_id' => 'required',
                'semester_id' => 'required',
                'specialization_id' => 'required',
            ]);
            Subject::create([
                'code' => $request->code,
                'name' => $request->name,
                'unit' => $request->unit,
                'type' => $request->type,
                'grade_level_id' => $request->grade_level_id,
                'semester_id' => $request->semester_id,
                'specialization_id' => $request->specialization_id,
            ]);

            Activity::log(auth()->user()->id, 'Subject Management', 'Added a subject.');
            return back()->with('toast_success', 'Subject successfully added.');
        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SMS\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SMS\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SMS\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        try {
            $subject->update([
                'code' => $request->code,
                'name' => $request->name,
                'unit' => $request->unit,
                'type' => $request->type,
                'semester_id' => $request->semester_id,
                'semester_id' => $request->semester_id,
                'specialization_id' => $request->specialization_id,
            ]);
            Activity::log(auth()->user()->id, 'Subject Management', 'Subject ' . $subject->name . ' updated');
            return back()->with('toast_success', 'Subject successfully updated.');
        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SMS\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $subject = Subject::findOrFail($id);
            Activity::log(auth()->user()->id, 'Subject Management', 'Deleted a Subject ' . $subject->name);
            $subject->delete();
            return back()->with('toast_success', 'Subject successfully deleted.');
        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
        }
    }
}
