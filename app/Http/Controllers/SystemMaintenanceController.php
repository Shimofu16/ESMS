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
use Illuminate\Support\Facades\Storage;

class SystemMaintenanceController extends Controller
{
    public function index(){

        // dd(Storage::disk('backup')->exists('backups'));
        $backups = $this->getBackups();
        $tracks = Track::all();
        $schoolYears = SchoolYear::all();
        $sems = Sem::all();
        $gradelevels = GradeLevel::all();
        $active_schoolYear_sems = Active_SchoolYearAndSem::with('schoolyear','sem')->first();
        $strands = Strand::with('track')->get();
        $specializations = Specialization::with('strand.track')->get();
        $sections = Section::with('specialization.enrollment')->get();
        return view('pages.SystemMaintenance.index',compact('backups','tracks','strands','specializations','gradelevels','schoolYears','active_schoolYear_sems','sems','sections'));
    }

    private function getBackups(){
        $path = 'CIT';
        $files = collect(Storage::disk('backup')->allFiles($path));

        //check if there is a backup already created
        if (Storage::disk('backup')->exists('')) {
            return redirect()->back()->with('error', 'Backup already created');
        }
        $backups = $files->map(function ($file) use ($path) {
            return [
                'name' => basename($file),
                'path' => $file,
                'size' => Storage::disk('backup')->size($file) >= 1048576 ? round(Storage::disk('backup')->size($file) / 1024 / 1024, 2) . ' MB' : round(Storage::disk('backup')->size($file) / 1024, 2) . ' KB',
                'disk' => 'backup',
                'url' => Storage::disk('backup')->url($file),
                'created_at' => Storage::disk('backup')->lastModified($file),
            ];
        })->sortByDesc('created_at');

        return $backups;
    }
}
