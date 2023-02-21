<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\courses;
use App\Models\Subject;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class QuizController extends Controller
{
    public function index($id){
        $course=courses::find($id);
        $quiz = Quiz::where('course_id', '=', $id)->get();
        $check = $quiz->count();
        if($check==1){
            $quiz=DB::select('select * from quizzes where course_id = ?', [$id]);
            //dd($quiz);
        }
        return view('teachers.Quizzes')->with('course',$course)->with('check',$check)->with('quiz',$quiz);
    }
    public function store(Request $req,$c_id)
    {
        $req->validate([
            'quiz_1' => 'required',
            'quiz_2' => 'required',
            'quiz_3' => 'required',
        ]);
        $id=Auth::user()->id;
        Quiz::create([
            'Teacher_id'=>$id,
            'course_id'=>$c_id,
            'Quiz_1'=>$req['quiz_1'],
            'Quiz_2'=>$req['quiz_2'],
            'Quiz_3'=>$req['quiz_3']
        ]);
        return redirect('/teachers/courses');
    }
    public function update_quiz(Request $req,$id){
        $req->validate([
            'quiz_1' => 'required',
            'quiz_2' => 'required',
            'quiz_3' => 'required',
        ]);
        $id=Auth::user()->id;
        $quiz=Quiz::where('id',$id)->get();
        Quiz::where('id',$id)->update([
            'Teacher_id'=>$id,
            'course_id'=>$quiz[0]->course_id,
            'Quiz_1'=>$req['quiz_1'],
            'Quiz_2'=>$req['quiz_2'],
            'Quiz_3'=>$req['quiz_3']
        ]);
        return redirect('/teachers/courses');
    }
    public function delete_quiz($id){
        $quiz=Quiz::find($id);
        $quiz->delete();
        return redirect('/teachers/courses');
    }
}
