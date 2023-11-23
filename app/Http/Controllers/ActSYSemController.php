<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Active_SchoolYearAndSem;

class ActSYSemController extends Controller
{
    public function update(Request $request, $id)
    {
        $act_sy_sem = Active_SchoolYearAndSem::findorfail($id);
 
        $act_sy_sem->active_SY_id = $request->schhol_year;
        $act_sy_sem->active_sem_id = $request->sem;
        $act_sy_sem->save();

        return redirect()->route('sys_main.index');
    }
}
