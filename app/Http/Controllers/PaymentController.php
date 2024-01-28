<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Payment;
use App\Models\Billing;

class PaymentController extends Controller
{
    public function index(){

        $students = Student::with('payments','enrollment')->where('status',1)->get();

        return view('pages.Accounting.Payment.index' ,compact('students') );
   }


    public function show($id){

        $students = Student::with('payments','enrollment')->findOrFail($id);

        return view('pages.Accounting.Payment.show' ,compact('students') );
    }

    public function store(Request $request){

        //dd($request->all());
         Payment::create([
             'std_id' => $request->std_id,
             'payment_particulars' => $request->payment_particulars,
             'payment_amt' => $request->payment_amt,
             'mode_of_payment' => $request->mode_of_payment,
             'reference_number' => $request->reference_number,
             'or_num' => $request->or_num,
             'transaction_date' => $request->transaction_date,
         ]);
         Activity::log(auth()->user()->id, 'Memo Management', 'Added Payment '. $request->payment_particulars);
        // return redirect::back()->with('msg', 'Success!');
        return redirect()->route('payment.show', $request->std_id);
     }

}
