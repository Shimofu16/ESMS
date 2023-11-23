<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class GraduateController extends Controller
{
    public function create(){

        $students = Student::with('enrollment.student')->whereHas('enrollment', function ($query) {
            return $query->where('gradelevel_id', 2)->where('sem_id', 2);
        })->orderBy('status', 'ASC')->where('status', 1)->get();
        return view ('pages.Graduate.create',compact('students'));
    }

    public function store(Request $request){
        $std_id = $request->student_id;

        for($i = 0; $i<count($std_id); $i++)
        {
             Student::findorfail($std_id[$i])->update([
                'status' => 3,
                'shs_yr_graduated' =>  $date = Carbon::now()->format('Y'),

               
             ]);
             
        }

        return redirect()->route('graduate.create')->with('success', 'Successfull!');
    }
}
