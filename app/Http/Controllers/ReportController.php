<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use App\Models\Student;
use App\Models\Active_SchoolYearAndSem;
use App\Models\SchoolYear;
use App\Models\Sem;
use App\Models\gradelevel;

class ReportController extends Controller
{
    public function yearly_report_index(){

        $active = Active_SchoolYearAndSem::first();
        $students = Student::with('enrollment.student')->get();


        // $students = Student::with('enrollment.student')->whereHas('enrollment', function ($query) use($active) {
        //     return $query->where('school_year_id', '=', $active->active_SY_id)->where('sem_id','=', $active->active_sem_id);
        // })->get();
        
        return view('pages.Reports.yearly_students',compact('students'));

    }

    public function student_list_index(){

        $active = Active_SchoolYearAndSem::first();
        $students = Student::with('enrollment.student')->whereHas('enrollment', function ($query) use($active) {
            return $query->where('school_year_id', '=', $active->active_SY_id)->where('sem_id','=', $active->active_sem_id);
        })->get();

       
        
        return view('pages.Reports.student_list',compact('students'));

    }

    public function document_submission_index(){

        $students = Student::with('document')->get();
        
        return view('pages.Reports.document_submission',compact('students'));

    }

    public function contact_info_sheet_index(){

        $active = Active_SchoolYearAndSem::first();
        $students = Student::with('enrollment.student')->whereHas('enrollment', function ($query) use($active) {
            return $query->where('school_year_id', '=', $active->active_SY_id)->where('sem_id','=', $active->active_sem_id);
        })->get();
        
        return view('pages.Reports.contact_info_sheet',compact('students'));

    }
}
