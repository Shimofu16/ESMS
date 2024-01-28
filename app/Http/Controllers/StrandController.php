<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;
use App\Models\Strand;
use App\Models\Track;

class StrandController extends Controller
{
    public function store(Request $request){

        Strand::create([
            'track_id' => $request->track,
            'strand' => $request->strand,
        ]);
        $track = Track::find($request->track);
        Activity::log(auth()->user()->id, 'Strand Management', 'Added strand ' . $request->strand . ' to strand' . $track->track);
        return redirect()->route('sys_main.index');
    }
}
