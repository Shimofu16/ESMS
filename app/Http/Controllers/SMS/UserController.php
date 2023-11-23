<?php

namespace App\Http\Controllers\SMS;

use App\Helpers\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.SMS.Users.index',[
            'users' => User::all(),
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'username' => 'required',
                'role' => 'required',
                'email' => 'required|unique:users',
                'passwordCreate' => 'required|min:8',
                'password_confirmationCreate' => 'required|same:passwordCreate',
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->input('passwordCreate')),
            ]);
            $user->assignRole($request->role);
            
            Activity::log(auth()->user()->id, 'User Management', 'Added new user');
            
            return back()->with('toast_success', 'Successfully added new user');
        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.SMS.Users.show',[
            'user' => User::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                     
        $request->validate([
            'passwordUpdate' => 'required|min:8',
            'password_confirmationUpdate' => 'required|same:passwordUpdate',
        ]);
        try {
            $user = User::findOrFail($id);
            $user->update([
                'password' => Hash::make($request->input('passwordUpdate')),
            ]);
            Activity::log(auth()->user()->id, 'User Management', 'Updated user '.$user->name.' password');
            return back()->with('toast_success', 'Successfully updated user password');
        } catch (\Throwable $th) {
            return back()->with('toast_error', $th->getMessage());
        }
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // try {
        //     $user = User::findOrFail($id);
        //     $user->update(['status' => 'offline']);
        //     GenerateUserSession::GenerateSession('User Management','Logged out user '.$user->name,auth()->user());
        //     return back()->with('successToast', 'Successfully logged out user');
        // } catch (\Throwable $th) {
        //     return back()->with('errorAlert', $th->getMessage());
        // }
    }
}
