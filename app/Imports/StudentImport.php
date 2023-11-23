<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Specialization;
use App\Models\SchoolYear;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Failure;
use Throwable;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class StudentImport implements ToCollection, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;
    public function collection(Collection $rows)
    {
        $specializations = Specialization::all();
        $school_years = SchoolYear::all();
        
        foreach ($rows as $row) 
        {
            $student = Student::create([
                //database => excel column//
            'lrn' => $row['LRN (Learners Reference Number)'],
            // 'std_num' => $row[''],
            'last_name' => $row['Last Name'],
            'first_name' => $row['First Name'],
            'middle_name' => $row['Middle Name'],
            'extension' => $row['Extension Name'],
            'civil_status' => $row['Civil Status'],
            'age' => $row['Age'],
            'sex' => $row['Sex'],
            'nationality' => $row['Nationality'],
            'b_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['Birthdate']),
            'contact_num' => $row['Contact No. of Student'],
            'house_num' => $row['House no./Street'],
            'purok' => $row['Purok'],
            'brgy' => $row['Barangay'],
            'municipality' => $row['Municipality'],
            'province' => $row['Province'],
            'f_name' => $row['Father Name  (Last Name/First Name/Middle Name)'],
            'f_occu' => $row['Occupation of Father'],
            'm_name' => $row['Mother Maiden Name (Last Name/First Name/Middle Name)'],
            'm_occu' => $row['Occupation of Mother'],
            'g_name' => $row['Name of Guardian (Last Name/First Name/Middle Name)'],
            'relationship' => $row['Relationship to Guardian'],
            'g_contact_num' => $row['Contact No. of Guardian'],
            'g_add' => $row['Address of Guardian'],
            'prev_school' => $row['School Last Attended '],
            'prev_school_type' => $row['Previous School Type'],
            'jhs_yrs' => $row['No. of Years in Junior High School'],
            'year_grad' => $row['Year Graduated '],
            'gen_ave' => $row['General Average'],
            'prim_grade' => $row['Primary Grade'],
            'prim_grade_yr' => $row['Year Graduated in Primary Grade'],
            'intermediate' => $row['Intermediate'],
            'intermediate_yr' => $row['Year Graduated in Intermediate'],
            'junior_hs' => $row['Junior High School'],
            'junior_hs_yr' => $row['Year Graduated in Junior High School'],
            
            'status' => '1', 
            ]);


            foreach($specializations as $specialization){
                if ($row['Specialization'] == $specialization->specialization){
                    $specialization_id = $specialization->id;
                }
            }

            foreach($school_years as $school_year){
                if ($row['Enroll for School Year'] == $school_year->school_year){
                    $school_year_id = $school_year->id;
                }
            }

            $enrollment_id = Student_Specialization_GradeLevel_SchoolYear::create([
                'student_id' => $student->id,
                'specialization_id' => $specialization_id,
                'school_year_id' => $school_year_id,
                'gradelevel_id' => 1,
                'sem_id' => 1,
            ]);
   
            Student::where('id',$student->id)->update([
               'enrollment_id' => $enrollment_id->id,
           ]);

        }

    }
    public function rules(): array{
        return [
          '*.LRN (Learners Reference Number)' => ['unique:students,lrn']
        ];
    }
}
