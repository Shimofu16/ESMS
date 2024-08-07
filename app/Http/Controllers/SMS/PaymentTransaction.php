<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use App\Models\Active_SchoolYearAndSem;
use App\Models\Section;
use App\Models\SMS\Fee;
use App\Models\SMS\PaymentTransaction as SMSPaymentTransaction;
use App\Models\SMS\TransactionFee;
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
        return view(
            'pages.SMS.PaymentTransactions.index',
            [
                'active_school_year' => Active_SchoolYearAndSem::find(1)->schoolYear->school_year,
                'transactions' =>  SMSPaymentTransaction::all(),
                'students' => Student::all(),
                'fees' => Fee::all(),
                'sections' => Section::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $student_id = null)
    {
        return view('pages.SMS.PaymentTransactions.create', [
            'students' =>  Student::all(),
            'student_id' =>  $student_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($transaction_id, ?string $fee_type = null)
    {
        $transactions = TransactionFee::query()
            ->where('transaction_id', $transaction_id);
        if ($fee_type) {
            $transactions->where('type', $fee_type);
        }
        return view('pages.SMS.PaymentTransactions.show', [
            'transaction_id' => $transaction_id,
            'transactions' => $transactions->get(),
            'active_school_year' =>  Active_SchoolYearAndSem::find(1)->schoolYear->school_year
        ]);
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
    public function soa()
    {
        try {
            return view(
                'pages.SMS.Exports.soa',
                [
                    // 'payment_transactions' => $payment_transactions,
                    // 'tuitions' => $payment_transactions->whereHas('transactions', function($query){
                    //     $query->where('type', 'tuition');
                    // })
                    // ->get(),
                ]
            );
        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
        }
    }
}
