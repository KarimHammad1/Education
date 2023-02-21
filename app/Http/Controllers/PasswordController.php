<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class PasswordController extends Controller
{
    public function index(){
        return view('student.Password');
    }
    public function change_pass(Request $request){
        if (!(Hash::check($request['current-password'], Auth::user()->password))) {
            return redirect()->back()->with("error_curr","Your current password does not matches with the password you provided.
             Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password.
            Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required ',
            'new_password' => 'required|confirmed|min:6',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
    }
}
