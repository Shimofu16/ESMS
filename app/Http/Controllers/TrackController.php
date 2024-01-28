<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;
use App\Models\Track;

class TrackController extends Controller
{
    public function store(Request $request){

        Track::create([
            'track' => $request->track
            ]
        );
        Activity::log(auth()->user()->id, 'track Management', 'Added track ' . $request->track );
        return redirect()->route('sys_main.index');

    }
}
