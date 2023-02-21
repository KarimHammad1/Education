<?php
namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\enrolls;
use App\Models\quizzes;
use App\Models\scores;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class enrollController extends Controller
{
    public function index($c_id){
        $quizzes=DB::table('quizzes')->where('course_id',$c_id)->exists();
        $id=0;
        if(Auth::user()){
        $id=Auth::user()->id;
        }
        $scores=scores::where('Student_id',$id)->where('Course_id',$c_id)->exists();
        if($scores!=null)
        {
            $scores=scores::where('Student_id',$id)->where('Course_id',$c_id)->get();
        }
        if($quizzes!=null)
        {
            $quizzes=DB::table('quizzes')->where('course_id',$c_id)->get();
        }
        //dd($scores[0]->Score);
        $course=courses::find($c_id);
        //dd($quizzes);
        $count = DB::table('enrolls')->where('course_id', $c_id)->count();
        if(!Auth::guest()){
            $u_id=Auth::user()->id;
            $enroll = DB::table('enrolls')->where('course_id',$c_id)->where('St_id', $u_id)->count();
            //dd(count($scores));
            //dd($scores->all());
            return view('student.enroll',['course'=>$course,'count'=>$count,
            'enroll'=>$enroll,'quizzes'=>$quizzes,'scores'=>$scores]);
        }
        return view('student.enroll',['course'=>$course,'count'=>$count]);
    }

    public function store($c_id){
        $user=Auth::user()->id;
        $course=courses::find($c_id);
        //dd($user);
        enrolls::create([
            'St_id'=>$user,
            'course_id'=>$c_id,
            'course_image'=>$course['image_path'],
            'course_name'=>$course['title']
        ]);
        return redirect('/courseInfo'.'/'.$c_id);
    }
    public function drop_course($c_id)
    {
        $u_id=Auth::user()->id;
        $del = DB::table('enrolls')->where('course_id',$c_id)->where('St_id',$u_id)->delete();
        return redirect()->back();
    }
}
