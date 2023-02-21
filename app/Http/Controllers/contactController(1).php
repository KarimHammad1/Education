<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\userreview;
use App\Models\User;

class contactController extends Controller
{
    public function index(){
        $id=Auth::user();
        if($id!=null){
            $id=Auth::user()->id;
            $user=User::find($id);
            return view('contact')->with('user',$user);
        }
        return view('contact');
    }
    public function storerev(Request $req){
        //dd($req->all());
        userreview::create([
            'name'=>$req['name'],
            'email'=>$req['email'],
            'phone'=>$req['phone'],
            'message'=>$req['message']
        ]);
        return back()->with('success', 'Thanks for contacting us!');
    }
}
