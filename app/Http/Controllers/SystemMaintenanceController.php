<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use App\Models\Strand;
use App\Models\Sem;
use App\Models\GradeLevel;
use App\Models\Specialization;
use App\Models\SchoolYear;
use App\Models\Active_SchoolYearAndSem;
use App\Models\Section;

class SystemMaintenanceController extends Controller
{
    public function index(){

        $tracks = Track::all();
        $schoolYears = SchoolYear::all();
        $sems = Sem::all();
        $gradelevels = GradeLevel::all();
        $active_schoolYear_sems = Active_SchoolYearAndSem::with('schoolyear','sem')->first();
        $strands = Strand::with('track')->get();
        $specializations = Specialization::with('strand.track')->get();
        $sections = Section::with('specialization.enrollment')->get();

        return view('pages.SystemMaintenance.index',compact('tracks','strands','specializations','gradelevels','schoolYears','active_schoolYear_sems','sems','sections'));
    }
}
