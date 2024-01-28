<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;
use App\Models\SchoolYear;

class SchoolYearController extends Controller
{
    public function store(Request $request){

        SchoolYear::create([
            'school_year' => $request->school_year,
        ]);
        Activity::log(auth()->user()->id, 'School Year Management', 'Added SY '. $request->school_year);
        return redirect()->route('sys_main.index');
    }
}
