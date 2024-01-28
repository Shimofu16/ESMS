<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Strand;

class SpecializationController extends Controller
{
    public function store(Request $request){

        Specialization::create([
            'specialization' => $request->specialization,
            'strand_id' => $request->strand,
        ]);
        $strand = Strand::find($request->strand);
        Activity::log(auth()->user()->id, 'Specialization Management', 'Added specialization ' . $request->specialization . ' to strand' . $strand->strand);
        return redirect()->route('sys_main.index');
    }
}
