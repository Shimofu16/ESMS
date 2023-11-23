<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Specialization;
use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Active_SchoolYearAndSem;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index(){

        
        $enrolled_students_cnt = Student::where('status', 1)->count();
        $active_school_year = Active_SchoolYearAndSem::with('schoolyear','sem')->first();


       
        $active = Active_SchoolYearAndSem::first();

        // $enrolled_students = Student_Specialization_GradeLevel_SchoolYear::with('student')->where('school_year_id', '=', $active->active_SY_id)->where('sem_id','=', $active->active_sem_id)->get();
        
        $enrolled_students_g11 = Student_Specialization_GradeLevel_SchoolYear::with('student')->whereHas('student', function($q){
            return $q->where('status',1);
        })->where('school_year_id', '=', $active->active_SY_id)->where('sem_id','=', $active->active_sem_id)->where('gradelevel_id',1)->get();
        $enrolled_students_g12 = Student_Specialization_GradeLevel_SchoolYear::with('student')->whereHas('student', function($q){
            return $q->where('status',1);
        })->where('school_year_id', '=', $active->active_SY_id)->where('sem_id','=', $active->active_sem_id)->where('gradelevel_id',2)->get();
        $spcs = Specialization::with('enrollment')->get();
        $grds = GradeLevel::all();

        $sections = Section::with('specialization.enrollment')->get();
       $students = Student::with('enrollment')->get();
    
        

        return view('pages.dashboard',compact('enrolled_students_cnt', 'active_school_year', 'enrolled_students_g11', 'enrolled_students_g12','spcs','grds','students','sections'));
    }
}
