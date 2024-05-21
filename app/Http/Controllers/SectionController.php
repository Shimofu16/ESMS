<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Student;
use App\Models\Active_SchoolYearAndSem;

class SectionController extends Controller
{

    public function index()
    {

        $active = Active_SchoolYearAndSem::first();
        $sections = Section::with('specialization', 'gradelevel')->get();

        $student_without_sections = Student::with('enrollment')->whereHas('enrollment', function ($q) use ($active) {
            $q->where('section_id', null)
                ->where('sem_id', $active->active_sem_id)
                ->where('school_year_id', $active->active_SY_id);
        })->where('status', 1)->get();



        return view('pages.Section.index', compact('sections', 'student_without_sections', 'active'));
    }

    public function store(request $request)
    {
        Section::create([
            'section' => $request->section,
            'gradelevel_id' => $request->gradelevel,
            'specialization_id' => $request->specialization,
        ]);
        Activity::log(auth()->user()->id, 'Section Management', 'Added section ' . $request->section . ' to Grade Level 1' . $request->gradelevel);
        return redirect()->route('sys_main.index');
    }
    public function update(request $request, $id)
    {
        $section = Section::find($id);
        $section->update([
            'section' => $request->section,
        ]);
        Activity::log(auth()->user()->id, 'Section Management', 'Update section ' . $request->section . ' to Grade Level 1' . $request->gradelevel);
        return redirect()->route('sys_main.index');
    }

    public function show($id)
    {
        $section = Section::with('students.student')->find($id);
        $students = $section->students()->with('student')->whereHas('student', function ($query) {
            $query->orderBy('sex');
        })->get();

        return view('pages.SMS.Exports.class-list', compact('section', 'students'));
    }
    public function destroy($id)
    {
        $section = Section::with('students')->find($id);

        if ($section->students->count() > 0) {
            return redirect()->back()->with('error', 'Section: '. $section->section . ' has students');
        }
        Activity::log(auth()->user()->id, 'Section Management', 'Deleted section: '. $section->section);
        $section->delete();
        return redirect()->back()->with('success', 'Successfully deleted section');
    }
}
