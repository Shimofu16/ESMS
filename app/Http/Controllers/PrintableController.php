<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use App\Models\Student;
use App\Models\Sem;
use App\Models\gradelevel;
use App\Models\Billing;
use App\Models\Payment;
use App\Models\Memo;
use App\Models\Active_SchoolYearAndSem;

class PrintableController extends Controller
{
    public function index_sis($id){

        $student = Student::with('enrollment.student')->where('id',$id)->first();
        return view('pages.Printables.sis_index', compact('student'));
    }

    // public function index_soa($id){

    //     $students = Student::with('memos')->findorfail($id);
    //     return view('pages.Printables.soa_index',compact('students'));

    // }

    public function index_soa($id){

        $students = Student::findOrFail($id);

        $active_school_year = Active_SchoolYearAndSem::with('schoolyear','sem')->first();
        $active = Active_SchoolYearAndSem::first();
        
        $billings = collect(Billing::where('std_id',$id)->get());
        $payments = collect(Payment::where('std_id',$id)->get());
        $memos = collect(Memo::where('student_id',$id)->get());
        $bills_pays = $billings->merge($payments)->merge($memos)->sortBy('created_at');
        $billings_sum = Billing::where('std_id',$id)->sum('billing_amt');
        $payments_sum = Payment::where('std_id',$id)->sum('payment_amt');
        $memo_credit_sum = Memo::where('student_id',$id)->where('memo_type','Credit')->sum('memo_amt');
        $memo_debit_sum = Memo::where('student_id',$id)->where('memo_type','Debit')->sum('memo_amt');
        $balance = $billings_sum - $payments_sum + $memo_credit_sum - $memo_debit_sum;

        return view('pages.Printables.soa_index' ,compact('students','bills_pays','balance', 'active_school_year', 'active') );

    }
}
