<?php

namespace App\Http\Livewire\PaymentTransaction;

use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\SMS\PaymentTransaction;
use Livewire\Component;

class Soa extends Component
{
    public $grade_level_id;
    public $grade_levels;
    public $section_id;
    public $sections;
    public $payment_transactions;
    public function updatedGradeLevelId($value){
        if ($value) {
            $this->sections = Section::where('gradelevel_id', $value)->get();
        }
    }
    public function updatedSectionId($value){
        if ($value) {
            $setting = getCurrentSettings();
            $this->payment_transactions = PaymentTransaction::query()
                ->where('school_year_id', $setting['school_year_id'])
                ->whereHas('student', function ($query) use ($value) {
                    $query->whereHas('enrollment', function ($que) use ($value) {
                        $que->where('section_id', $value);
                    });
                })
                ->get();
            if (!$this->payment_transactions) {
                return session()->flash('error', 'No Transactions yet.');
            }
            if (!checkIfStudentHasTuitionFee($this->payment_transactions)) {
                return session()->flash('error', 'Some students do not have a tuition fee.');
            }
            foreach ($this->payment_transactions as $key => $temp) {
                if ($temp->student->enrollment->section_id == null) {
                    return session()->flash('error', "Student {$temp->student->full_name} do not have an assigned section.");
                }
            }
        }
    }
    public function mount(){
        $this->grade_levels = GradeLevel::all();
        $this->sections = collect();
        $this->payment_transactions = collect();
    }
    public function render()
    {
        return view('livewire.payment-transaction.soa');
    }
}
