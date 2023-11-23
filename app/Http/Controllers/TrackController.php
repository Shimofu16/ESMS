<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;

class TrackController extends Controller
{
    public function store(Request $request){

        Track::create([
            'track' => $request->track
            ]
        );

        return redirect()->route('sys_main.index');

    }
}
