<?php

namespace App\Http\Controllers;
use App\Models\courses;
use App\Models\User;
use App\Models\enroll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class mylearningController extends Controller
{
    public function index(){
        $u_id=Auth::user()->id;
        $courses=enroll::where('St_id', $u_id)->get();
        //dd($courses[0]);
        return view('student.mycourses')->with('courses',$courses);
    }
}
