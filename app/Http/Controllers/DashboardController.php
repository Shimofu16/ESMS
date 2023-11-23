<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Specialization;
use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Active_SchoolYearAndSem;
use App\Models\Student_Specialization_GradeLevel_SchoolYear;
use Illuminate\Database\Eloquent\Builder;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        $active_school_year = Active_SchoolYearAndSem::with('schoolyear', 'sem')->first();
        $active = Active_SchoolYearAndSem::first();
        $enrolled_students_cnt = Student::with('enrollment')
            ->select('status')
            ->whereHas('enrollment', function (Builder $query) use ($active) {
                $query->where('school_year_id', $active->active_SY_id);
            })
            ->where('status', 1)
            ->count();
        $graduate_students_count =  $students = Student::select('status')->where('status', 3)->count();

        $gradeLevels = [1, 2];
        $studentsCountPerSpecializationForGrades = [];

        foreach ($gradeLevels as $gradeLevel) {
            $studentsCountPerSpecializationForGrades["grade1{$gradeLevel}"] =
                Specialization::withCount(['enrollment as total_students_count' => function (Builder $query) use ($active, $gradeLevel) {
                    $query->where('school_year_id',  $active->active_SY_id)
                        ->where('gradelevel_id', $gradeLevel)
                        ->whereHas('student', function (Builder $q) {
                            $q->where('status', 1);
                        });
                }, 'enrollment as male_students_count' => function (Builder $query) use ($active, $gradeLevel) {
                    $query->where('school_year_id',  $active->active_SY_id)
                        ->where('gradelevel_id', $gradeLevel)
                        ->whereHas('student', function (Builder $q) {
                            $q->where('status', 1)
                                ->where('sex', 'Male');
                        });
                }, 'enrollment as female_students_count' => function (Builder $query) use ($active, $gradeLevel) {
                    $query->where('school_year_id',  $active->active_SY_id)
                        ->where('gradelevel_id', $gradeLevel)
                        ->whereHas('student', function (Builder $q) {
                            $q->where('status', 1)
                                ->where('sex', 'Female');
                        });
                }])
                ->get();
        }
        
        return view(
            'pages.dashboard',
            compact('enrolled_students_cnt', 'studentsCountPerSpecializationForGrades',  'graduate_students_count')
        );
    }
}
