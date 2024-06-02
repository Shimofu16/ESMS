<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use App\Models\Section;


class AddStudentoSectionController extends Controller
{
    public function store(Request $request){

        $section = Section::findOrFail($request->section_id);

        foreach($request->student_id as $student_id){

            $student = Student_Specialization_GradeLevel_SchoolYear::where('student_id',$student_id)->where('section_id',null)->first();

            if($student->specialization_id ==  $section->specialization_id){
                if ($section->students()->count() >= 30) {
                    return redirect()->route('section.index')->with('toast_error', 'Section is full');
                }
                $student->section_id = $request->section_id;
                $student->save();
            }
        }

        Activity::log(auth()->user()->id, 'Section Management', 'Added '. count($request->student_id) .' students to section ' . $section->section );

        return redirect()->back()->with('success', 'Added '. count($request->student_id) .' students to section ' . $section->section );

    }
}
