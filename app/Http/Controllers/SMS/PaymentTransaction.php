<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use App\Models\Active_SchoolYearAndSem;
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
                'fees',
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(?int $student_id = null)
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
    public function soa(?int $grade_level_id = null)
    {
        $setting = getCurrentSettings();
        $payment_transactions = SMSPaymentTransaction::query()->where('school_year_id', $setting['school_year_id']);
        $transactions_temp = $payment_transactions->get();
        if (!$payment_transactions->get()) {
            return redirect()->route('transaction.index')->with('error', 'No Transactions yet.');
        }
        if (!checkIfStudentHasTuitionFee($transactions_temp)) {
            return redirect()->route('transaction.index')->with('error', 'Some students do not have a tuition fee.');
        }
        foreach ($transactions_temp as $key => $temp) {
            if ($temp->student->enrollment->section_id == null) {
                return redirect()->route('transaction.index')->with('error', "Student {$temp->student->full_name} do not have an assigned section.");
            }
        }

        if ($grade_level_id) {
            $payment_transactions= $payment_transactions->whereHas('student', function ($query) use ($grade_level_id){
                $query->whereHas('enrollment', function ($que) use ($grade_level_id){
                    $que->where('gradelevel_id', $grade_level_id);
                });
            });
        }
        return view('pages.SMS.Exports.soa',
        [
            'payment_transactions' => $payment_transactions->get()
        ]
    );
    }
}
