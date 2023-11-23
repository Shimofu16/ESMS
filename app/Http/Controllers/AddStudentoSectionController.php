<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use App\Models\Section;


class AddStudentoSectionController extends Controller
{
    public function store(Request $request){

        $section = Section::findorfail($request->section_id);

        foreach($request->student_id as $student_id){

            $student = Student_Specialization_GradeLevel_SchoolYear::where('student_id',$student_id)->where('section_id',null)->first();

            if($student->specialization_id ==  $section->specialization_id){
                if ($section->students()->count() >= 10) {
                    return redirect()->route('section.index')->with('toast_error', 'Section is full');
                }
                $student->section_id = $request->section_id;
                $student->save();
            }
        }

        return redirect()->route('section.index');

    }
}
