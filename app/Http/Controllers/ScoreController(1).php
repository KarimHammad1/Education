<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses;
use App\Models\scores;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ScoreController extends Controller
{
    public function index($id){
        $course=courses::find($id);
        $t_id=Auth::user()->id;
        $scores=DB::select('select * from scores where Teacher_id = ? and course_id='.$id, [$t_id]);
        $i=0;
        $user=[];
        foreach($scores as $score){
        $user[$i]=DB::select("select name,email from users where id= ? AND user_role='student'", [$score->Student_id]);
        $i++;
    }
        return view('teachers.Scores')->with('course',$course)->with('scores',$scores)->with('user',$user);
    }
    public function store(Request $req,$c_id){
        $req->validate([
            'st_email' => 'required | email',
            'score' => 'required | numeric',
            'quiz_num' => 'required',
        ]);
        $t_id=Auth::user()->id;
        $s_id=DB::select("select id from users where email= ? AND user_role='student'", [$req->st_email]);
        if($s_id==null)
        {
            return redirect('/Scores/'.$c_id)->with('message', 'This student is not enroll in this course');
        }
        $score=(int)$req['score'];
        $quiz_num=(int)$req['quiz_num'];
        $s=$s_id[0]->id;
        $sc = scores::where('Student_id', '=',$s)->where('Course_id', $c_id)->get();
        $scoreCount = $sc->count();
        if($scoreCount<3)
        {
        if($s){
            scores::create([
                'Teacher_id'=>$t_id,
                'Student_id'=>$s_id[0]->id,
                'Email'=>$req->st_email,
                'Course_id'=>$c_id,
                'Score'=>$score,
                'Quiz_num'=>$quiz_num,
            ]);
            
            return redirect('/Scores/'.$c_id);
            }
        }
        return redirect('/Scores/'.$c_id)->with('message', 'You Cannot insert more than 3 scores for one student');
    }
    function index_update($id){
        $score=scores::find($id);
        return view('teachers.Scores_update')->with('score',$score);
    }
    function update(Request $req,$id){
        $req->validate([
            'st_email' => 'required | email',
            'score' => 'required | numeric',
            'quiz_num' => 'required',
        ]);
        $t_id=Auth::user()->id;
        $s_id=DB::select("select id from users where email= ? AND user_role='student'", [$req->st_email]);
        $score=(int)$req['score'];
        $quiz_num=(int)$req['quiz_num'];
        if($s_id){
                $s=scores::where('id',$id)->update([
                        'Email'=>$req->st_email,
                        'Score'=>$score,
                        'Quiz_num'=>$quiz_num,
                ]);
        $s=scores::find($id);
        //dd($s);
            return redirect('/Scores/'.$s->Course_id);
        }
    }
    function delete($id){
        $score=scores::find($id);
        $score->delete();
        return redirect()->back();
    }
}