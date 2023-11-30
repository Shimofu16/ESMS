<?php

namespace App\Http\Controllers\SMS;

use App\Helpers\Activity;
use App\Models\Sem;
use App\Models\Section;
use App\Models\SMS\Subject;
use App\Models\SMS\Teacher;
use App\Models\SMS\Schedule;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Models\Active_SchoolYearAndSem;
use Illuminate\Database\Eloquent\Collection;

class ScheduleController extends Controller
{
    public $path;
    public $sy_id;
    public function __construct()
    {
        $this->path = 'uploads/schedules/';
        $this->sy_id = Active_SchoolYearAndSem::find(1)->active_SY_id;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        $teachers = Teacher::select('id', 'name')->get();
        $sections = Section::select('id', 'section')->get();
        $subjects = Subject::select('id', 'name')->get();
        $semesters = Sem::select('id', 'sem')->get();


        $specializations = Specialization::all();
        return view(
            'pages.SMS.Schedules.index',
            compact('schedules', 'teachers', 'specializations', 'sections', 'subjects', 'semesters')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $schedules = Schedule::orderBy('start_time','ASC')->get();

        return view('pages.SMS.Schedules.show', compact('schedules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $schedule = Schedule::findOrFail($id);
            $title = $schedule->subject->name;
            $schedule->delete();
            Activity::log(auth()->user()->id, 'Schedule Management', 'Deleted a schedule ' . $title);
            return redirect()->back()->with('successToast', 'Schedule deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }
}
