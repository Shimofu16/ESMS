<?php

namespace App\Http\Livewire\PaymentTransaction;

use App\Models\Active_SchoolYearAndSem;
use App\Models\Section;
use App\Models\SMS\Fee;
use App\Models\SMS\PaymentTransaction;
use App\Models\SMS\TransactionFee;
use App\Models\SMS\TransactionFeeBalance;
use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public $students;
    public bool $hasRegistrationFee = false;
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
            $this->resetThingsUp();
        }
        $this->selected_fees = collect();
    }
    public function updatedStudentId($value)
    {
        if ($value) {
            $this->selected_fees = collect();
            $this->array_selected_fees = [];
            $this->resetThingsUp();
        }
    }
    public function resetThingsUp($function_name = '')
    {
        if ($function_name == 'fees') {
            $this->getFees();
            $this->fee_id = null;
        }
        $student = Student::find($this->student_id);
        // Get the final list of fees based on the merged fee IDs
        $this->fees = $this->getStudentFees($student->id, $student->sex);
        // dd( $this->getFees());
    }

    public function updatedFeeId($value)
    {
        if ($value) {
            $this->array_selected_fees[$value] = $value;
            $this->resetThingsUp('fees');
            foreach ($this->selected_fees as $fee) {
                if ($fee['type'] == 'registration') {

                }

            }
        }
    }
    private function getFees()
    {
        $transaction = PaymentTransaction::with('student', 'transactions')
            ->where('student_id', $this->student_id)
            ->where('school_year_id', $this->school_year['school_year_id'])
            ->first();

        $this->selected_fees = collect(Fee::find($this->array_selected_fees))
            ->keyBy('id') // Set the array key to fee id
            ->map(function ($fee) use ($transaction) {
                $fee->balance = 0;
                if ($transaction) {
                    $temp_transaction =  $transaction->transactions()->with('balances')
                        ->where('fee_id', $fee->id)
                        ->first();
                    if ($temp_transaction && !empty($temp_transaction->balances)) {
                        $latest_balance = $temp_transaction->balances()->latest()->first();
                        // Add the balance to the fee
                        if ($latest_balance) {
                            $fee->balance = $latest_balance->balance;
                        }
                    }
                }
                return  $fee;
            });
    }
    private function getStudentFees($student_id, $gender)
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
        $fees_ids = array_merge($fee_ids_with_balance, $fee_ids_without_balance,);
        $fees_with_gender = Fee::whereIn('id', $fee_ids_with_balance)
            ->orWhereNotIn('id', $fees_ids)
            ->where('gender', $gender)
            ->orderBy('type')
            ->pluck('id')
            ->toArray();
        $fees_without_gender = Fee::whereIn('id', $fee_ids_with_balance)
            ->orWhereNotIn('id', $fees_ids)
            ->whereNull('gender')
            ->orderBy('type')
            ->pluck('id')
            ->toArray();
        $fees_ids = array_merge($fees_ids, $fees_with_gender, $fees_without_gender);
        if ($this->array_selected_fees) {

            return    $this->fees = Fee::whereIn('id', $fees_ids)
                ->whereNotIn('id', $this->array_selected_fees)
                ->orderBy('type')
                ->get();
        }
        return  $this->fees = Fee::whereIn('id', $fees_ids)
            ->orderBy('type')
            ->get();
    }

    public function removeFee($key)
    {
        if (array_key_exists($key, $this->selected_fees->toArray()) &&  array_key_exists($key, $this->array_selected_fees)) {
            unset($this->selected_fees->toArray()[$key]);
            unset($this->array_selected_fees[$key]);
            $this->resetThingsUp('fees');
        }
    }
    public function save()
    {
        // Check if there's enough amount for registration fee
        // foreach ($this->selected_fees as $fee) {
        //     if ($fee['type'] == 'registration' && (int)$this->amount[$fee['id']] != $fee['amount']) {
        //         return session()->flash('error', 'Insufficient amount for registration fee');
        //     }
        // }

        // Get student and active transaction
        $student = Student::find($this->student_id);
        $transaction = PaymentTransaction::with('student', 'transactions')
            ->where('student_id', $student->id)
            ->where('school_year_id', $this->school_year['school_year_id'])
            ->first();

        // Process transaction
        if ($transaction) {
            $this->processExistingTransaction($transaction, $student);
        } else {
            $this->processNewTransaction($student);
        }
        $toast_message = 'Successfully Created Transactions';
        if ($this->hasRegistrationFee) {
            $toast_message = "{$toast_message} and enrolled students";
        }
        return redirect(route('transaction.create'))->with('success', $toast_message);
    }

    // Process existing transaction
    private function processExistingTransaction($transaction, $student)
    {
        foreach ($this->selected_fees as $fee) {
            $temp_transaction = $transaction->transactions()
                ->with('balances')
                ->where('fee_id', $fee['id'])
                ->first();

            if ($temp_transaction && !empty($temp_transaction->balances)) {
                $this->processExistingTransactionWithBalances($temp_transaction, $fee, $student);
            } else {
                $this->processExistingTransactionWithoutBalances($transaction, $fee, $student);
            }
        }
    }

    // Process transaction without balances
    private function processExistingTransactionWithoutBalances($transaction, $fee, $student)
    {
        $transaction_fee = TransactionFee::create([
            'transaction_id' => $transaction->id,
            'fee_id' => $fee['id'],
            'fee_amount' => $fee['amount'],
            'amount' => $this->amount[$fee['id']],
            'type' => $fee['type']
        ]);

        // if ($fee['type'] == 'registration' && (int)$this->amount[$fee['id']] >= $fee['amount']) {
        if ($fee['type'] == 'registration') {
            $this->hasRegistrationFee = true;
            $this->updateStudentStatusAndAssignToSection($student);
        } else {
            $this->createTransactionFeeBalance($transaction_fee, $fee);
        }
    }

    // Process transaction with balances
    private function processExistingTransactionWithBalances($temp_transaction, $fee, $student)
    {
        $latestBalance = $temp_transaction->balances()->latest()->first();

        $temp_transaction->balances()->create([
            'balance' => $latestBalance->balance - $this->amount[$fee['id']],
            'amount' => $this->amount[$fee['id']]
        ]);

        // if ($fee['type'] == 'registration' && (int)$this->amount[$fee['id']] >= $fee['amount']) {
        if ($fee['type'] == 'registration') {
            $this->hasRegistrationFee = true;
            $this->updateStudentStatusAndAssignToSection($student);
        }
    }

    // Process new transaction
    private function processNewTransaction($student)
    {
        $transaction = PaymentTransaction::create([
            'student_id' => $student->id,
            'school_year_id' => $this->school_year['school_year_id'],
            'mode_of_payment' => 'Cash',
        ]);

        foreach ($this->selected_fees as $fee) {
            $transaction_fee = TransactionFee::create([
                'transaction_id' => $transaction->id,
                'fee_id' => $fee['id'],
                'fee_amount' => $fee['amount'],
                'amount' => $this->amount[$fee['id']],
                'type' => $fee['type']
            ]);

            if ($fee['type'] == 'registration') {
                $this->hasRegistrationFee = true;
                $this->updateStudentStatusAndAssignToSection($student);
            }
            // if ($fee['type'] == 'registration' && (int)$this->amount[$fee['id']] >= $fee['amount']) {
            //     $this->updateStudentStatusAndAssignToSection($student);
            // } else {
            //     $this->createTransactionFeeBalance($transaction_fee, $fee);
            // }
            $this->createTransactionFeeBalance($transaction_fee, $fee);
        }
    }

    // Update student status and assign to section
    private function updateStudentStatusAndAssignToSection($student)
    {
        $student->update([
            'status' => 1
        ]);

        $enrollment = getStudentEnrollment($student->id);
        $sections = Section::where('specialization_id', $enrollment->specialization_id)
            ->where('gradelevel_id', $enrollment->gradelevel_id)
            ->get();

        foreach ($sections as $key => $section) {
            if ($section->students->count() < 30) {
                $enrollment->update(['section_id' => $section->id]);
            }
        }
        // dd($enrollment, $section->id);
    }

    // Create transaction fee balance
    private function createTransactionFeeBalance($transaction_fee, $fee)
    {
        //check if the amount is greater than the payed amount
        if ($fee['amount'] > $this->amount[$fee['id']]) {
            TransactionFeeBalance::create([
                'transaction_fee_id' => $transaction_fee->id,
                'balance' => $fee['amount'] - $this->amount[$fee['id']],
                'amount' => $this->amount[$fee['id']]
            ]);
        }
    }



    public function render()
    {
        return view('livewire.payment-transaction.create');
    }
}
