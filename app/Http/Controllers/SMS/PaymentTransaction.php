<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use App\Models\Active_SchoolYearAndSem;
use App\Models\SMS\Fee;
use App\Models\SMS\PaymentTransaction as SMSPaymentTransaction;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentTransaction extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = Active_SchoolYearAndSem::find(1);
        $transactions = SMSPaymentTransaction::all();

        $students = Student::all();
        $fees = Fee::all();

        return view('pages.SMS.PaymentTransactions.index', compact('transactions', 'students', 'fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fees = Fee::all();
        $total = 0;
        foreach ($fees as $key => $fee) {
            $total = $total + $fee->amount;
        }
        $active = Active_SchoolYearAndSem::find(1);
        $student = Student::with('transactions')
            ->whereHas('transactions', function ($query) use ($active) {
                $query->where('school_year_id', $active->active_SY_id);
            })
            ->where('student_id', $request->student_id)
            ->first();
        if ($student) {
            return back()->with('toast_error', "Student $student->full_name already has transaction for SY: $active->schoolyear->school_year ");
        }
        SMSPaymentTransaction::create([
            'student_id' => $request->student_id,
            'school_year_id' => $active->active_SY_id,
            'mode_of_payment' => 'Cash',
            'total_amount' => $total,
            'amount' =>  $request->amount,
        ]);
        return back()->with('toast_success', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
