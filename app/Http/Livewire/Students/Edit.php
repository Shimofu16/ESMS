<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Carbon\Carbon;
use Livewire\Component;

class Edit extends Component
{
    public Student $student;
    public bool $isEditable = false;

    public string $lrn = '';
    public string $first_name = '';
    public string $middle_name = '';
    public string $last_name = '';
    public string $extension_name = '';
    public $birthday = '';
    public int $age;
    public string $sex = '';
    public string $civil_status = '';
    public string $nationality = '';
    public $contact_number;
    public string $house_number = '';
    public string $purok = '';
    public string $barangay = '';
    public string $municipality = '';
    public string $province = '';

    public function mount(Student $student)
    {
        // dd($student);
        $this->student = $student;
        $this->resetValues();
    }

    private function resetValues()
    {
        $this->lrn = $this->student->lrn ?? '';
        $this->first_name = $this->student->first_name ?? '';
        $this->middle_name = $this->student->middle_name ?? '';
        $this->last_name = $this->student->last_name ?? '';
        $this->extension_name = $this->student->extension ?? '';
        $this->birthday = $this->isEditable ?  Carbon::parse($this->student->b_date)->format('m/d/Y') : Carbon::parse($this->student->b_date)->format('F d, Y');
        $this->age = $this->student->age;
        $this->sex = $this->student->sex;
        $this->civil_status = $this->student->civil_status;
        $this->nationality = $this->student->nationality;
        $this->contact_number = $this->student->contact_num;
        $this->house_number = $this->student->house_num;
        $this->purok = $this->student->purok;
        $this->barangay = $this->student->brgy;
        $this->municipality = $this->student->municipality;
        $this->province = $this->student->province;
    }

    public function editMode()
    {

        if ($this->isEditable) {
            $this->isEditable = false;
            $this->resetValues();
        } else {
            $this->isEditable = true;
        }

        // dd('asdasd');
    }

    public function save()
    {
        $this->student->lrn = $this->lrn;
        $this->lrn = $this->student->lrn;
        $this->student->first_name = $this->first_name;
        $this->student->middle_name = $this->middle_name;
        $this->student->last_name = $this->last_name;
        $this->student->extension = $this->extension_name;
        $this->student->b_date = $this->birthday;
        $this->student->age = $this->age;
        $this->student->sex = $this->sex;
        $this->student->civil_status = $this->civil_status;
        $this->student->nationality = $this->nationality;
        $this->student->contact_num = $this->contact_number;
        $this->student->house_num = $this->house_number;
        $this->student->purok = $this->purok;
        $this->student->brgy = $this->barangay;
        $this->student->municipality = $this->municipality;
        $this->student->province = $this->province;
        $this->student->save();
        return redirect()->to("/students/enrolled/show/{$this->student->id}")->with('success', "Successfully updated {$this->student->full_name} information");
    }

    public function render()
    {
        return view('livewire.students.edit');
    }
}
