<?php

namespace App\Imports;

use App\Models\Active_SchoolYearAndSem;
use App\Models\GradeLevel;
use App\Models\Specialization;
use App\Models\Strand;
use App\Models\Student;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ImportGradeTwelveEnrollees implements
    ToCollection,
    WithHeadingRow,
    SkipsEmptyRows
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $status = ['Regular', 'Irregular'];
        foreach ($collection as $row) {
        // Initialize birthdate to null
        $birthdate = null;
            $specialization = Specialization::where('specialization', 'like', '%' . $row['specialization'] . '%')->first();
            $isStudentAlreadyExist = Student::where('lrn', $row['lrn'])->orWhere('lrn', 'like', '%' . $row['lrn'] . '%')->first();
            if (!$isStudentAlreadyExist && $specialization) {
                // Map the collection data to the student model fields
                $student = new Student();
                $student->lrn = $row['lrn'];
                $student->std_num = $row['std_num'];
                $student->last_name = $row['last_name'];
                $student->first_name = $row['first_name'];
                $student->middle_name = $row['middle_name'];
                $student->extension = $row['extension'];
                $student->civil_status = $row['civil_status'];
                $student->age = $row['age'];
                $student->sex = $row['sex'];
                $student->nationality = $row['nationality'];


                // Check if the birthdate is in Excel serial date format (numeric)
                if (is_numeric($row['birthdate'])) {
                    $birthdate = Carbon::createFromFormat('Y-m-d', gmdate('Y-m-d', ($row['birthdate'] - 25569) * 86400));
                } else {
                    // Try to parse the birthdate as standard date formats
                    try {
                        $birthdate = Carbon::createFromFormat('m/d/Y', $row['birthdate']);
                    } catch (\Exception $e) {
                        try {
                            $birthdate = Carbon::createFromFormat('F d, Y', $row['birthdate']);
                        } catch (\Exception $e) {
                            // Handle invalid date formats or log the error
                            // Optionally, you can set a default value or skip the record
                            $birthdate = null;
                        }
                    }
                }
                $student->contact_num = $row['contact_num'];
                $student->house_num = $row['house_num'];
                $student->purok = $row['purok'];
                $student->brgy = $row['brgy'];
                $student->municipality = $row['municipality'];
                $student->province = $row['province'];
                $student->f_name = $row['father_name'];
                $student->f_occu = $row['father_occu'];
                $student->m_name = $row['mother_name'];
                $student->m_occu = $row['mother_occu'];
                $student->g_name = $row['guardian_name'];
                $student->relationship = $row['relationship'];
                $student->g_contact_num = $row['guardian_contact_num'];
                $student->g_add = $row['guardian_add'];
                $student->prev_school = $row['prev_school'];
                $student->prev_school_type = $row['prev_school_type'];
                $student->jhs_yrs = $row['jhs_yrs'];
                $student->year_grad = $row['year_grad'];
                $student->gen_ave = $row['gen_ave'];
                $student->prim_grade = $row['prim_grade'];
                $student->prim_grade_yr = $row['prim_grade_yr'];
                $student->intermediate = $row['intermediate'];
                $student->intermediate_yr = $row['intermediate_yr'];
                $student->junior_hs = $row['junior_hs'];
                $student->junior_hs_yr = $row['junior_hs_yr'];
                $student->type = $row['type'] ?? $status[random_int(0, 1)];
                $student->status = $row['status'] ?? 0;

                $student->save();

                $school_year = Active_SchoolYearAndSem::first();

                $specialization = Specialization::where('specialization', 'like', '%' . $row['specialization'] . '%')->first();
                // dd($specialization, $row['specialization']);
                $enrollment_id = Student_Specialization_GradeLevel_SchoolYear::create([
                    'student_id' => $student->id,
                    'specialization_id' => $specialization->id,
                    'gradelevel_id' => 2,
                    'school_year_id' => $school_year->active_SY_id,
                    'sem_id' => 1,
                ]);

                $student->update([
                    'enrollment_id' => $enrollment_id->id,
                ]);
            }
        }
    }
}
