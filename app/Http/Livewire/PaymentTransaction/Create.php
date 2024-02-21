<?php

namespace App\Http\Livewire\PaymentTransaction;

use App\Models\Active_SchoolYearAndSem;
use App\Models\SMS\Fee;
use App\Models\SMS\PaymentTransaction;
use App\Models\SMS\TransactionFee;
use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public $students;
    public $student_id;
    public $fees;
    public $array_selected_fees;
    public $selected_fees;
    public $fee_id;
    public $active;
    public $amount;
    public $total = 0;


    public function mount()
    {
        $this->active =  Active_SchoolYearAndSem::find(1);
        $this->fees = collect();
        $this->selected_fees = collect();
        $this->array_selected_fees = [];
    }
    public function updatedStudentId($value)
    {
        $transaction = PaymentTransaction::with('student', 'fees')
            ->where('student_id', $value)
            ->where('school_year_id', $this->active->active_SY_id)
            ->first();
        $this->fees = Fee::all();
        if ($transaction) {
            foreach ($transaction->fees as $key => $transaction_fee) {
                $fees[] = $transaction_fee->fee_id;
            }
            $this->fees = Fee::whereNotIn('id', $fees)->get();
        }
    }
    public function updatedFeeId($value)
    {
        $this->array_selected_fees[] = $value;
        $this->selected_fees = Fee::find($this->array_selected_fees);
    }
    public function save()
    {

        $student = Student::find($this->student_id);
        $total = 0;
        foreach ($this->selected_fees as $key => $fee) {
            $total += $fee->amount;
        }
        if ($this->amount > $total) {
            // if ($student) {
            //     return back()->with('toast_error', "Student $student->full_name already has transaction for SY: $this->active->schoolyear->school_year ");
            // }

            $transaction_id =  PaymentTransaction::create([
                'student_id' => $this->student_id,
                'school_year_id' => $this->active->active_SY_id,
                'mode_of_payment' => 'Cash',
                'total_amount' => $total,
                'amount' => $this->amount,
            ])->id;
            foreach ($this->selected_fees as $key => $fee) {
                TransactionFee::create([
                    'transaction_id' => $transaction_id,
                    'fee_id' => $fee->id
                ]);
            }
            return redirect()->to(route('transaction.index'))
                ->with('toast_success', 'Added Successfully');
        }
        $this->addError('amount', 'Insufficient Amount');
    }

    public function render()
    {
        return view('livewire.payment-transaction.create');
    }
}
