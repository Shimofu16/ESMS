<?php

namespace App\Http\Controllers;

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
}
