<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\courses;
use App\Models\Quiz;
use App\Models\enrolls;
use App\Models\scores;
use App\Models\Subject;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Repository\ICommentRepository;

class teacherController extends Controller
{
    public function index(){
        return view('teachers.teacherHome');
    }
    public $cour;

    public function CourseIndex(Request $req){
        $id=Auth::user()->id;
        $courses=DB::select('select * from courses where Teacher_id = ?', [$id]);
        return view('teachers.teacherCourse')->with('courses',$courses);
    }

    public function addingCourseIndex(){
        $subjects=Subject::all();
        return view('teachers.teacherForm')->with('subjects',$subjects);
    } 
    public function storeCourse(Request $req){
        $req->validate([
            'Tittle' => 'required',
            'Duration' => 'required',
            'URL' => 'required',
            'Modules'=>'required',
            'Description'=>'required',
            'video' => 'required|file|mimetypes:video/mp4',
            'Image' => 'required |mimes:jpeg,bmp,png',
            'subject'=>'required',
        ]);
        $id=Auth::user()->id;
        $path_i = $req->file('Image')->store('image', ['disk' =>'my_files']);
        $path_v = $req->file('video')->store('videos', ['disk' =>'my_files']);
         courses::create([
            'title'=>$req['Tittle'],
            'Teacher_id'=>$id,
            'duration'=>$req['Duration'],
            'url'=>$req['URL'],
            'modules'=>$req['Modules'],
            'description'=>$req['Description'],
            'image_path'=>$path_i,
            'video_path'=>$path_v,
            'subject_id'=>$req['subject']
        ]);
        return redirect('/teachers/courses');
    }
    function edit(Request $req,$id){
        $course=courses::find($id);
        $subjects=Subject::all();
        return view('teachers.teacherForm_update', ['course' => $course])->with('subjects',$subjects);
    }

    function update(Request $req,$id){
        //dd($req->all());
        $req->validate([
            'Tittle' => 'required',
            'Duration' => 'required',
            'URL' => 'required',
            'Modules'=>'required',
            'Description'=>'required','video' => 'required|file|mimetypes:video/mp4',
            'Image' => 'required |mimes:jpeg,bmp,png',
            'subject'=>'required',
        ]);
        $user=Auth::user()->id;
        
        $path_i = $req->file('Image')->store('image', ['disk' =>'my_files']);
        $path_v = $req->file('video')->store('videos', ['disk' =>'my_files']);
        courses::where('id',$id)->update([
            'title'=>$req['Tittle'],
            'Teacher_id'=>$user,
            'description'=>$req['Description'],
            'duration'=>$req['Duration'],
            'modules'=>$req['Modules'],
            'url'=>$req['URL'],
            'image_path'=>$path_i,
            'video_path'=>$path_v,
            'subject_id'=>$req['subject']
        ]);
        return redirect('/teachers/courses');
    }
    function delete($id){
        $course=courses::find($id);
        $course->delete();
        $scores=scores::where('Course_id',$id)->delete();
        $enrolls=enrolls::where('course_id',$id)->delete();
        $quizzes=Quiz::where('course_id',$id)->delete();
        return redirect('/teachers/courses');
    }
   
}
