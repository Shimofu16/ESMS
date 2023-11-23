<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use App\Models\Student;
use App\Models\Active_SchoolYearAndSem;
use App\Models\SchoolYear;
use App\Models\Sem;
use App\Models\gradelevel;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class EnrolledStudentController extends Controller
{
    public function index(){

        $active = Active_SchoolYearAndSem::first();
        $students = Student::with('enrollment.student')->whereHas('enrollment', function ($query) use($active) {
            return $query->where('school_year_id', '=', $active->active_SY_id)->where('sem_id','=', $active->active_sem_id);
        })->where('status', 1)->get();
        
        
        
        return view('pages.StudentRecord.EnrolledStudents.index',compact('students'));

    }

    public function show($id){

        $student = Student::with('enrollment.student' , 'document')->where('id',$id)->first();
        return view('pages.StudentRecord.EnrolledStudents.show',compact('student'));

    }
    
    public function edit($id){
        
        $schoolyears = SchoolYear::all();
        $students = Student::with('enrollment.student')->where('id',$id)->first();
        $sems = Sem::all();
        $gradelevels = GradeLevel::all();
        return view('pages.StudentRecord.EnrolledStudents.edit',compact('students','schoolyears','sems','gradelevels'));
        
    }

    public function update(Request $request, $id){
        
        if($request->hasFile('image')){
            $image = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('student',  $image, 'public');     
        }
        $student = Student::findOrfail($id);
        
        $student->image= $image;
        $student->lrn = $request->lrn;
        $student->std_num = $request->std_num;
        $student->last_name = $request->last_name;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->extension = $request->extension;
        $student->civil_status = $request->civil_status;
        $student->age = $request->age;
        $student->sex = $request->sex;
        $student->nationality = $request->nationality;
        $student->b_date = $request->b_date;
        $student->contact_num = $request->contact_num;
        $student->house_num = $request->house_num;
        $student->purok = $request->purok;
        $student->brgy = $request->brgy;
        $student->municipality = $request->municipality;
        $student->province = $request->province;
        $student->f_name = $request->f_name;
        $student->f_occu = $request->f_occu;
        $student->m_name = $request->m_name;
        $student->m_occu = $request->m_occu;
        $student->g_name = $request->g_name;
        $student->relationship = $request->relationship;
        $student->g_contact_num = $request->g_contact_num;
        $student->g_add = $request->g_add;
        $student->prev_school = $request->prev_school;
        $student->prev_school_type = $request->prev_school_type;
        $student->jhs_yrs = $request->jhs_yrs;
        $student->year_grad = $request->year_grad;
        $student->gen_ave = $request->gen_ave;
        $student->prim_grade = $request->prim_grade;
        $student->prim_grade_yr = $request->prim_grade_yr;
        $student->intermediate = $request->intermediate;
        $student->intermediate_yr = $request->intermediate_yr;
        $student->junior_hs = $request->junior_hs;
        $student->junior_hs_yr = $request->junior_hs_yr;

   
       $student->save();

        return redirect()->route('enrolled_student.show', $id);


    }
    
    public function drop($id, Request $request){

        Student::findorfail($id)->update([
            
            'status' => 2, 
            'reason_for_dropout' => $request->reason_for_dropout, 
            'dropout_date' =>  $todayDate = Carbon::now()->format('Y-m-d'), 
         //   dd($todayDate),

        ]);

        return redirect()->route('enrolled_student.index')->with('warning', 'Student Dropped');

    }

    public function select(){
        $sems = Sem::all();
        $tracks = DB::table('tracks')->get();
        $schoolyears = SchoolYear::all();
        $gradelevels = GradeLevel::all();
        
        $students = Student::with('enrollment.student')->orderBy('status', 'ASC')->where('status', '!==', 3)->get();
        return view('pages.Enrollment.EnrollExistingStudent.index',compact('students','tracks','schoolyears','gradelevels','sems'));
    }
}
