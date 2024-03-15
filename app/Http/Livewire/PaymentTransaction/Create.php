<?php

namespace App\Http\Livewire\PaymentTransaction;

use App\Models\Active_SchoolYearAndSem;
use App\Models\SMS\Fee;
use App\Models\SMS\PaymentTransaction;
use App\Models\SMS\TransactionFee;
use App\Models\SMS\TransactionFeeBalance;
use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public $students;
    public $student_id;
    public $fees;
    public $array_selected_fees;
    public $selected_fees;
    public $registration_fee;
    public $fee_id;
    public $school_year;
    public $amount;
    public $total = 0;


    public function mount()
    {
        $this->school_year =  getCurrentSettings();
        $this->array_selected_fees = [];
        $this->fees = collect();
        if ($this->student_id) {
            // Get the final list of fees based on the merged fee IDs
            $this->fees = $this->getFees($this->student_id);

        }
        $this->selected_fees = collect();
        // $this->array_selected_fees[] = Fee::where('type', 'registration')->first()->id;
        // $this->fees = Fee::whereNotIn('id', $this->array_selected_fees)->get();
        // $this->selected_fees = Fee::find($this->array_selected_fees);
        // dd($this->selected_fees);
    }
    public function updatedStudentId($value)
    {
        if ($value) {
            // Get the final list of fees based on the merged fee IDs
            $this->fees = $this->getFees($value);
        }
    }


    public function updatedFeeId($value)
    {
        if ($value) {
            $this->array_selected_fees[] = $value;
            $transaction = PaymentTransaction::with('student', 'transactions')
                ->where('student_id', $this->student_id)
                ->where('school_year_id', $this->school_year['school_year_id'])
                ->first();

            $this->selected_fees = collect(Fee::find($this->array_selected_fees))->map(function ($fee) use ($transaction) {
                $fee->balance = 0;
                if ($transaction) {
                    $temp_transaction =  $transaction->transactions()->with('balances')
                        ->where('fee_id', $fee->id)
                        ->first();
                    if ($temp_transaction && !empty($temp_transaction->balances)) {
                        $latest_balance = $temp_transaction->balances()->latest()->first();
                        // Convert the array of selected fees to a collection of objects
                        if ($latest_balance) {
                            // Add the balance to the fee
                            $fee->balance = $latest_balance->balance;
                        }
                    }
                }
                return  $fee; // Cast each item to an object
            });
            // dd($this->selected_fees);

        }
    }


    public function save()
    {
        $total = 0;
        $isPayedRightAmount = true;
        foreach ($this->selected_fees as $key => $fee) {
            if ($fee['type'] == 'registration') {
                if ((int)$this->amount[$fee['id']] != $fee['amount']) {
                    $isPayedRightAmount = false;
                    session()->flash('error', 'Insufficient amount for registration fee');
                    break;
                }
            }
        }
        if ($isPayedRightAmount) {
            // session()->forget('error');
            $student = Student::find($this->student_id);
            $transaction = PaymentTransaction::with('student', 'transactions')
                ->where('student_id', $student->id)
                ->where('school_year_id', $this->school_year['school_year_id'])
                ->first();
            if ($transaction) {
                foreach ($this->selected_fees as $key => $fee) {
                    $temp_transaction =  $transaction->transactions()
                        ->with('balances')
                        ->where('fee_id', $fee['id'])
                        ->first();

                    if ($temp_transaction && !empty($temp_transaction->balances)) {
                        $latestBalance = $temp_transaction->balances()->latest()->first();
                        $temp_transaction->balances()->create([
                            'balance' =>  $latestBalance->balance - $this->amount[$fee['id']],
                            'amount' => $this->amount[$fee['id']]
                        ]);
                    } else {
                        $transaction_fee =   TransactionFee::create([
                            'transaction_id' => $transaction->id,
                            'fee_id' => $fee['id'],
                            'fee_amount' => $fee['amount'],
                            'amount' => $this->amount[$fee['id']],
                            'type' => $fee['type']
                        ]);
                        if ($fee['amount'] > $this->amount[$fee['id']]) {
                            TransactionFeeBalance::create([
                                'transaction_fee_id' => $transaction_fee->id,
                                'balance' =>  $fee['amount'] - $this->amount[$fee['id']],
                                'amount' => $this->amount[$fee['id']]
                            ]);
                        }
                    }
                }
            } else {
                $transaction =  PaymentTransaction::create([
                    'student_id' => $student->id,
                    'school_year_id' => $this->school_year['school_year_id'],
                    'mode_of_payment' => 'Cash',
                ]);
                foreach ($this->selected_fees as $key => $fee) {
                    $transaction_fee =   TransactionFee::create([
                        'transaction_id' => $transaction->id,
                        'fee_id' => $fee['id'],
                        'fee_amount' => $fee['amount'],
                        'amount' => $this->amount[$fee['id']],
                        'type' => $fee['type']
                    ]);
                    if ($fee['amount'] > $this->amount[$fee['id']]) {
                        TransactionFeeBalance::create([
                            'transaction_fee_id' => $transaction_fee->id,
                            'balance' =>  $fee['amount'] - $this->amount[$fee['id']],
                            'amount' => $this->amount[$fee['id']]
                        ]);
                    }
                }
            }

            return redirect(route('transaction.create'))->with('toast_success', 'Successfully Created Transactions');
        }
    }

    private function getFees($student_id)
    {
        // Initialize an empty array to store fee IDs with balances
        $fee_ids_with_balance = [];
        // Initialize an empty array to store fee IDs without balances
        $fee_ids_without_balance = [];
        // Initialize an empty array to store fee IDs without balances
        $fees_ids = [];

        // Find the payment transaction for the selected student in the active school year
        $transaction = PaymentTransaction::with('student', 'transactions')
            ->where('student_id', $student_id)
            ->where('school_year_id', $this->school_year['school_year_id'])
            ->first();

        if ($transaction) {
            // Iterate through each transaction associated with the payment transaction
            foreach ($transaction->transactions as $transaction_fee) {
                // Check if the transaction has balances
                if ($transaction_fee->balances->count() > 0) {
                    $latest_balance = $transaction_fee->balances()->latest()->first();
                    if ($latest_balance->balance == 0) {
                        // Store the fee ID with balance
                        $fee_ids_without_balance[] = $transaction_fee->fee_id;
                    } else {
                        $fee_ids_with_balance[] = $transaction_fee->fee_id;
                    }
                } else {
                    // Store the fee ID without balance
                    $fee_ids_without_balance[] = $transaction_fee->fee_id;
                }
            }
        }
        $fees_ids = array_merge($fee_ids_with_balance, $fee_ids_without_balance);
        return Fee::whereIn('id', $fee_ids_with_balance)
        ->orWhereNotIn('id', $fees_ids)
        ->get();
    }

    public function render()
    {
        return view('livewire.payment-transaction.create');
    }
}
