<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;
use App\Models\Active_SchoolYearAndSem;
use App\Models\Student;

class ActSYSemController extends Controller
{
    public function update(Request $request, $id)
    {
        try {
            $active = Active_SchoolYearAndSem::findOrFail($id);
            if ($request->school_year == $active->active_SY_id) {
                if ($active->active_sem_id == 1 && $request->sem == 2) {
                    $students = Student::with('enrollment')
                        ->whereHas('enrollment', function ($query) use ($active) {
                            $query
                                ->where('school_year_id', $active->active_SY_id)
                                ->where('sem_id', 1);
                        })
                        ->get();
                    if ($students) {

                        foreach ($students as $key => $student) {
                            $student->enrollment->update([
                                'sem_id' => 2,
                            ]);
                        }
                    }
                    Activity::log(auth()->user()->id, 'Active School Year Management', 'Update Semester to 2nd sem');
                }
            }else if ($request->school_year > $active->active_SY_id) {
                $students = Student::with('enrollment')
                    ->whereHas('enrollment', function ($query) use ($active) {
                        $query
                            ->where('school_year_id', $active->active_SY_id)
                            ->where('sem_id', 2);
                    })
                    ->get();
                foreach ($students as $key => $student) {
                    $student->enrollment->update([
                        'school_year_id' => $request->school_year,
                        'gradelevel_id' => 2,
                        'sem_id' => 1,
                    ]);
                }
            }
            $sem_id = $request->sem;
            if ($request->school_year > $active->active_SY_id) {
                $sem_id = 1;
                Activity::log(auth()->user()->id, 'Active School Year Management', 'Update SY to '. $request->$request->school_year. ' and Semester to 1st sem');
            }

            $active->active_SY_id = $request->school_year;
            $active->active_sem_id = $sem_id;
            $active->save();
            return redirect()->route('sys_main.index');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
