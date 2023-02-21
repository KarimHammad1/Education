<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class homeController extends Controller
{
    public function index(){
        $subject=Subject::all();
        return view('Home')->with('subject',$subject);
    }
    
    public function store(Request $req) { //registration
        $req->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => 'required|confirmed|min:6',
            'phone_number'=>'required|min:8|numeric',
        ]);
    $users = User::where('email', $req->email)->get();
    if(sizeof($users) > 0){
        return back()->with('flash', 'This user already signed up !');
    }
        User::create([
            'name'=>$req['name'],
            'phone_number'=>$req['phone_number'],
            'email'=>$req['email'],
            'user_role'=>'student',
            'password'=>bcrypt($req['password'])
        ]);

        return back()->with('success', 'Congrates you have signed up.Go to login now');
    }
    function doLogin(Request $request)
    {
        if (Auth::attempt(['email'=>$request['email_log'],'password'=>$request['password_log']]))
          {
            if(Auth::user()->user_role=="admin")
            {
                return redirect('/admin');
            }
            return redirect('/');

          }
        else{
            return redirect('/');
        }
    }
    public function Logout(Request $req)
    {
        Auth::logout();
        return redirect('/');
    }

}
