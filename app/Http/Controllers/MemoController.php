<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Memo;

class MemoController extends Controller
{
    public function index(){

        $students = Student::with('payments','enrollment')->where('status',1)->get();
        return view('pages.Accounting.Memo.index',compact('students'));

    }
    public function show($id){

        $students = Student::with('memos','enrollment')->findorfail($id);

        return view('pages.Accounting.Memo.show',compact('students'));

    }

    public function store(Request $request){

        Memo::create([
            'student_id' => $request->std_id,
            'memo_particulars' => $request->memo_particulars . ' (memo)',
            'memo_amt' => $request->memo_amt,
            'memo_date' => $request->memo_date,
            'memo_type' => $request->memo_type,
        ]);
        Activity::log(auth()->user()->id, 'Memo Management', 'Added Memo '. $request->memo_particulars);
       return redirect()->route('memo.show', $request->std_id);
    }
}
