<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Student;
use App\Models\Active_SchoolYearAndSem;
use App\Models\GradeLevel;
use App\Models\Specialization;

class SectionController extends Controller
{

    public function index($grade_level_id, $specialization_id = null)
    {

        $active = Active_SchoolYearAndSem::first();
        $sections = Section::with('specialization', 'gradelevel')
            ->where('gradelevel_id', $grade_level_id)
            ->where('specialization_id', $specialization_id)
            ->get();
        $grade_level = GradeLevel::find($grade_level_id);
        $grade_levels = GradeLevel::all();
        $specialization = Specialization::find($specialization_id);
        $specializations = Specialization::all();

        $students = Student::with('enrollment')->whereHas('enrollment', function ($q) use (
            $active,
            $grade_level,
            $specialization
        ) {
            $q->where('section_id', null)
                ->where('gradelevel_id', $grade_level->id)
                ->where('specialization_id', $specialization->id)
                ->where('sem_id', $active->active_sem_id)
                ->where('school_year_id', $active->active_SY_id);
        })
        ->where('status', 1)->get();



        return view(
            'pages.Section.index',
            compact(
                'sections',
                'students',
                'active',
                'grade_levels',
                'grade_level',
                'specialization',
                'specializations',
            )
        );
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
            return redirect()->back()->with('error', 'Section: ' . $section->section . ' has students');
        }
        Activity::log(auth()->user()->id, 'Section Management', 'Deleted section: ' . $section->section);
        $section->delete();
        return redirect()->back()->with('success', 'Successfully deleted section');
    }
}
