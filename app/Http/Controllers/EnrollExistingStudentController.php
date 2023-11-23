<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use App\Models\Student;
use App\Models\SchoolYear;
use App\Models\GradeLevel;
use App\Models\Sem;
class EnrollExistingStudentController extends Controller
{


    public function create(){
        $sems = Sem::all();
        $tracks = DB::table('tracks')->get();
        $schoolyears = SchoolYear::all();
        $gradelevels = GradeLevel::all();
        
        $students = Student::with('enrollment.student')->orderBy('status', 'ASC')->where('status', '!=', 3)->get();
        return view('pages.Enrollment.EnrollExistingStudent.index',compact('students','tracks','schoolyears','gradelevels','sems'));
    }

    function get_strand(Request $request){
        $tracks = DB::table('strands')->where('track_id',$request->track_id)->get();
        return response()->json($tracks);
    }   
    function get_specialization(Request $request){
        $cities = DB::table('specializations')->where('strand_id',$request->strand_id)->get();
        return response()->json($cities);
    }

    public function store(Request $request){

        $std_id = $request->student_id;
        for($i = 0; $i<count($std_id); $i++)
        {
             $student = Student::findorfail($std_id[$i]);

             $enrollment_id = Student_Specialization_GradeLevel_SchoolYear::create([
                'student_id' =>  $student->id,
                'specialization_id' => $request->specialization,
                'gradelevel_id' => $request->grade_level,
                'school_year_id' => $request->school_year,
                'sem_id' => $request->sem,
             ]);


            //  $records = [
            //     [
            //         
            //     ]
            // ];   
            // $enrollment_id = Student_Specialization_GradeLevel_SchoolYear::insert($records);

 
            Student::where('id',$std_id[$i])->update([
                'enrollment_id' => $enrollment_id->id,
            ]);
        }

        return redirect()->route('enroll_existing_student.create')->with('success', 'Students Enrolled Successfully!');
        
    }
}
