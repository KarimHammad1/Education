<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('student.profile')->with('user',$user);
    }
    function update(Request $req){
        $user1=Auth::user();
         $req->validate([
             'name' =>  'min:3',
             'email' => ['email'],
              'phone'=>'min:6',
            'Image' => ' mimes:jpeg,bmp,png',
         ]);
        $image=$req->file('Image');
        if($image==null)
        {
            $image=$user1->image;
        }else
        {
            $image = $req->file('Image')->store('image', ['disk' =>'my_files']);
        }
        //dd($image);
        $user1->name=$req['name'];
        $user1->image=$image;
        $user1->address = $req['address'];
        $user1->email = $req['email'];
        $user1->phone_number = $req['phone'];
        $user1->save();
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('student.profile')->with('user',$user);
    }
}
