<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TutorMail;
use Illuminate\Support\Facades\Input;
use Mail;
class MailController extends Controller
{
    public function ContactMail(Request $request){
         $validated = $request->validate([
             'name' => 'required|max:255',
             'email' => 'required|email',
             'yt_link' => 'required',
             'phone' => 'required',
         ]);
         $user=$request->all();
        Mail::to('education@gmail.org')->send(new \App\Mail\TutorMail($user));
        return redirect()->back();
    }
}
