<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportEnrollStudentController extends Controller
{

    function create(){
    
        return view('pages.Enrollment.EnrollImport.index');
    }

    public function import(Request $request) 
    {
        Excel::import(new StudentImport, $request->file('file'));
        
        return redirect()->back()->with('success', 'Students Imported Successfully!');
    }
}
