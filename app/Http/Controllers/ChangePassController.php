<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePassController extends Controller
{
    public function index(){

        return view('pages.ChangePass.index');
    }


    public function update(Request $request){   

    
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
            
        ]);
        
        if(!Hash::check($request->old_password, auth()->user()->password)){
             return redirect()->back()->with('errors', 'Old password does not match!');
        }
        
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('success', 'Password has been changed!');
    }
}
