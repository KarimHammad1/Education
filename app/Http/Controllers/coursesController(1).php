<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses;
use App\Models\Subject;
class coursesController extends Controller
{
    public function index(){
        $subject=Subject::all();
        return view('courses_st')->with('subject',$subject);
    }
    public function courses($id){
        $subject=Subject::find($id);
        $courses= courses::where('subject_id', '=', $id)->get();
        return view('student.courses')->with('courses',$courses)->with('subject',$subject);
    }
}
