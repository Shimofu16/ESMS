<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Billing;


class BillingController extends Controller
{
    public function index(){

         $students = Student::with('enrollment.student')->where('status', 1)->get();
        
         return view('pages.Accounting.Billing.index' ,compact('students') );
    }

    public function show($id){

        $students = Student::with('billings','enrollment')->findOrFail($id);
        
        return view('pages.Accounting.Billing.show' ,compact('students') );
    }

    public function store(Request $request){
       
        Billing::create([
            'std_id' => $request->std_id,
            'billing_particulars' => $request->billing_particulars,
            'billing_amt' => $request->billing_amt,
            'billing_date' => $request->billing_date,
        ]);

       return redirect()->route('billing.show', $request->std_id);
    }

    public function batchCreate(){

        $students = Student::with('enrollment.student')->where('status', 1)->get();
       
        return view('pages.Accounting.Billing.batchCreate' ,compact('students') );
   }

   public function batchStore(Request $request){

    $std_id = $request->student_id;
    for($i = 0; $i<count($std_id); $i++)
    {
         $student = Student::findorfail($std_id[$i]);
         Billing::create([
            'std_id' => $student->id,
            'billing_particulars' => $request->billing_particulars,
            'billing_amt' => $request->billing_amt,
            'billing_date' => $request->billing_date,
        ]);
    }

    return redirect()->route('billing.index');
    
}

}
