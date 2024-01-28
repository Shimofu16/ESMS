<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Billing;
use App\Models\Payment;
use App\Models\Memo;


class Bill_Pay_Report_Controller extends Controller
{
    public function index(){

         $students = Student::with('payments','enrollment')->where('status',1)->get();

         return view('pages.Accounting.Report.index' ,compact('students') );

    }

    public function show($id){

        $students = Student::findOrFail($id);

        $billings = collect(Billing::where('std_id',$id)->get());
        $payments = collect(Payment::where('std_id',$id)->get());
        $memos = collect(Memo::where('student_id',$id)->get());

        $bills_pays = $billings->merge($payments)->merge($memos)->sortBy('created_at');

        $billings_sum = Billing::where('std_id',$id)->sum('billing_amt');
        $payments_sum = Payment::where('std_id',$id)->sum('payment_amt');

        $memo_credit_sum = Memo::where('student_id',$id)->where('memo_type','Credit')->sum('memo_amt');
        $memo_debit_sum = Memo::where('student_id',$id)->where('memo_type','Debit')->sum('memo_amt');

        // foreach($bills_pays as $bills_pay){
        //     $array[] = [
        //         $records['date'] = $bills_pay->billing_date,
        //         $records['particulars'] = $bills_pay->billing_particulars,
        //         $records['debit'] = $bills_pay->billing_amt,
        //         $records['credit'] = $bills_pay->payment_amount,
        //         $records['balance'] = 'computed',
        //     ];
        // }
        // dd($array);


        $balance = $billings_sum - $payments_sum + $memo_credit_sum - $memo_debit_sum;

        return view('pages.Accounting.Report.show' ,compact('students','bills_pays','balance') );

    }
}
