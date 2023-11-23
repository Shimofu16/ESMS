<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Strand;

class StrandController extends Controller
{
    public function store(Request $request){
        
        Strand::create([
            'track_id' => $request->track,
            'strand' => $request->strand,
        ]);

        return redirect()->route('sys_main.index');
    }
}
