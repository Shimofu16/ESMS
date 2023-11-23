<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    public function store(Request $request){
        
        Specialization::create([
            'specialization' => $request->specialization,
            'strand_id' => $request->strand,
        ]);

        return redirect()->route('sys_main.index');
    }
}
