<?php

namespace App\Http\Livewire;

use App\Models\Active_SchoolYearAndSem;
use App\Models\GradeLevel;
use App\Models\Specialization;
use App\Models\Strand;
use App\Models\Student;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use App\Models\Track;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EnrollmentForm extends Component
{
    use WithFileUploads;

    public $titles;
    public $current_step = 1;
    public $total_step = 5;

    // select - data
    public $grade_levels;
    public $tracks;
    public $strands;
    public $specializations;

    // input fields
    // student
    public $student_photo;
    public $student_lrn;
    public $student_no;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $extension_name;
    public $civil_status;
    public $gender;
    public $birth_date;
    public $nationality;
    public $contact_no;
    // select fields
    public $grade_level_id;
    public $track_id;
    public $strand_id;
    public $specialization_id;

    // address
    public $house_no;
    public $purok;
    public $barangay;
    public $municipality;
    public $province;

    // guardian
    public $father_name;
    public $father_occupation;
    public $mother_name;
    public $mother_occupation;
    public $guardian_name;
    public $guardian_relationship;
    public $guardian_address;
    public $guardian_contact_no;

    // previous school
    public $previous_school;
    public $type_of_school;
    public $number_of_years;
    public $year_graduated;
    public $average;

    // educational background
    public $primary_grade;
    public $year_graduated_primary;
    public $intermediate;
    public $year_graduated_intermediate;
    public $junior_highschool;
    public $year_graduated_junior_highschool;




    // event listeners
    protected function getListeners()
    {
        return ['captured' => 'imageCaptured'];
    }

    public function imageCaptured($imageData)
    {
        $img =  $imageData;
        $folderPath = "public/student/";
        $image_parts = explode(";base64,", $img);
        foreach ($image_parts as $key => $image) {
            $image_base64 = base64_decode($image);
        }
        $fileName = uniqid() . '.png';

        $file = $folderPath . $fileName;

        // Storage::put($file, $image_base64);
        $this->student_photo = [
            'name' => $fileName,
            'image' => $image_base64,
            'url' => Storage::url($file)
        ];
    }

    // validating data
    public function validateData()
    {
        switch ($this->current_step) {
            case 1:
                $this->validate([
                    'student_lrn' => 'required',
                    'student_no' => 'required',
                    'first_name' => 'required',
                    'middle_name' => 'required',
                    'last_name' => 'required',
                    'extension_name' => 'required',
                    'civil_status' => 'required',
                    'gender' => 'required',
                    'birth_date' => 'required',
                    'nationality' => 'required',
                    'contact_no' => 'required',
                    'grade_level_id' => 'required',
                    'track_id' => 'required',
                    'strand_id' => 'required',
                    'specialization_id' => 'required',
                    'student_photo' => 'required',
                ]);
                break;
            case 2:
                $this->validate([
                    'house_no' => 'required',
                    'purok' => 'required',
                    'barangay' => 'required',
                    'municipality' => 'required',
                    'province' => 'required',
                ]);
                break;
            case 3:
                $this->validate([
                    'father_name' => 'required',
                    'father_occupation' => 'required',
                    'mother_name' => 'required',
                    'mother_occupation' => 'required',
                    'guardian_name' => 'required',
                    'guardian_relationship' => 'required',
                    'guardian_address' => 'required',
                    'guardian_contact_no' => 'required',
                ]);
                break;
            case 4:
                $this->validate([
                    'previous_school' => 'required',
                    'type_of_school' => 'required',
                    'number_of_years' => 'required',
                    'year_graduated' => 'required',
                    'average' => 'required',
                ]);
                break;
            case 5:
                $this->validate([
                    'primary_grade' => 'required',
                    'year_graduated_primary' => 'required',
                    'intermediate' => 'required',
                    'year_graduated_intermediate' => 'required',
                    'junior_highschool' => 'required',
                    'year_graduated_junior_highschool' => 'required',
                ]);
                break;
        }
    }

    // updated fields
    public function updatedTrackId($track)
    {
        $this->strands = Strand::where('track_id', $track)
            ->get()
            ->pluck('strand', 'id');
    }

    public function updatedStrandId($strand)
    {
        $this->specializations = Specialization::where('strand_id', $strand)
            ->get()
            ->pluck('specialization', 'id');
    }

    // functions
    public function increaseStep()
    {

        $this->resetErrorBag();
        $this->validateData();
        $this->current_step++;
        if ($this->current_step > $this->total_step) {
            $this->current_step = $this->total_step;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->current_step--;
        if ($this->current_step < 1) {
            $this->current_step = 1;
        }
    }

    public function save()
    {
        $this->resetErrorBag();
        $this->validateData();

        try {
            $folderPath = "public/student/";
            $extension = $this->student_photo->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $file = $folderPath . $fileName;
            $this->student_photo->storeAs($folderPath, $fileName);

            $student = new Student();
            $student->lrn = $this->student_lrn;
            $student->std_num = $this->student_no;
            $student->last_name = $this->last_name;
            $student->first_name = $this->first_name;
            $student->middle_name = $this->middle_name;
            $student->extension = $this->extension_name;
            $student->civil_status = $this->civil_status;
            $student->age = Carbon::parse($this->birth_date)->age;
            $student->sex = $this->gender;
            $student->nationality = $this->nationality;
            $student->b_date = $this->birth_date;
            $student->contact_num = $this->contact_no;
            $student->house_num = $this->house_no;
            $student->purok = $this->purok;
            $student->brgy = $this->barangay;
            $student->municipality = $this->municipality;
            $student->province = $this->province;
            $student->f_name = $this->father_name;
            $student->f_occu = $this->father_occupation;
            $student->m_name = $this->mother_name;
            $student->m_occu = $this->mother_occupation;
            $student->g_name = $this->guardian_name;
            $student->relationship = $this->guardian_relationship;
            $student->g_contact_num = $this->guardian_contact_no;
            $student->g_add = $this->guardian_address;
            $student->prev_school = $this->previous_school;
            $student->prev_school_type = $this->type_of_school;
            $student->jhs_yrs = $this->number_of_years;
            $student->year_grad = $this->year_graduated_junior_highschool;
            $student->gen_ave = $this->average;
            $student->prim_grade = $this->primary_grade;
            $student->prim_grade_yr = $this->year_graduated_primary;
            $student->intermediate = $this->intermediate;
            $student->intermediate_yr = $this->year_graduated_intermediate;
            $student->junior_hs = $this->junior_highschool;
            $student->junior_hs_yr = $this->year_graduated_junior_highschool;
            $student->status = '1';



            $student->image = $fileName;
            $student->save();

            $school_year = Active_SchoolYearAndSem::first();
            $enrollment_id = Student_Specialization_GradeLevel_SchoolYear::create([
                'student_id' => $student->id,
                'specialization_id' => $this->specialization_id,
                'gradelevel_id' => $this->grade_level_id,
                'school_year_id' => $school_year->active_SY_id,
                'sem_id' => $school_year->active_sem_id,
            ]);

            Student::where('id', $student->id)->update([
                'enrollment_id' => $enrollment_id->id,
            ]);
            return redirect()->to('/')->with('success', 'Student Successfully Enrolled!');
            $this->resetExcept(['current_step', 'total_step', 'titles']);
        } catch (\Throwable $th) {
            dd($th);
        }
    }



    public function mount()
    {
        $this->grade_levels = GradeLevel::pluck('grade_level as name', 'id');
        $this->tracks = Track::pluck('track', 'id');
        $this->titles = [
            'Student Information',
            'Address',
            'Parent`s / Guardian`s Information',
            'Previous School Information',
            'Educational Background'
        ];
        // dd($this->tracks, $this->grade_levels);
    }
    public function render()
    {
        return view('livewire.enrollment-form');
    }
}
