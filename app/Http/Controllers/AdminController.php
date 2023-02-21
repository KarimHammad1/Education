<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\courses;
use App\Models\enrolls;
use App\Models\Subject;
use App\Models\scores;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login_index(){
        return view('admin.admin_login');
    }
    public function index(){
        $courses_count = courses::count();
        $student = User::where('user_role', '=', 'student')->get();
        $studentCount = $student->count();
        $teacher = User::where('user_role', '=', 'teacher')->get();
        $teacherCount = $teacher->count();
        $counts=[$courses_count,$studentCount,$teacherCount];
        return view('admin.main')->with('counts',$counts);
    }
    public function Users(){
        $users=User::all();
        return view('admin.users_admin')->with('users',$users);
    }
    public function Teachers(){
        return view('admin.Teacher');
    }
    public function Courses(){
        $courses=courses::all();
        return view('admin.courses')->with('courses',$courses);
    }
    public function EnrollCourses(){
        $enrolls=enrolls::all();
        return view('admin.enroll_admin')->with('enrolls',$enrolls);
    }
    public function Quiz(){
        $quizzes=Quiz::all();
        return view('admin.quiz')->with('quizzes',$quizzes);
    }
    public function Scores(){
        $scores=scores::all();
        return view('admin.scores')->with('scores',$scores);
    }
    public function sc_view($id){
        $score=scores::find($id);
        return view('admin.scores_form')->with('score',$score);
    }
    public function q_view($id){
        $quiz=Quiz::find($id);
        return view('admin.quiz_forms')->with('quiz',$quiz);
    }
    public function addTeacher(Request $req){
        //dd($req->all());
        $req->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => 'required|min:6',
            'address' => 'required',
            'phone_number'=>'required|min:6',
            'Image' => 'required |mimes:jpeg,bmp,png',
        ]);
         User::create([
            'name'=>$req['name'],
            'phone_number'=>$req['phone_number'],
            'email'=>$req['email'],
            'user_role'=>'teacher',
            'address'=>$req['address'],
            'password'=>bcrypt($req['password'])
        ]);
        return redirect('/admin/users');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $users=DB::table('users')->where('name','LIKE','%'.$request->search."%")->get();
            if($users)
            {
            foreach ($users as $key => $user) {
            $output.='<tr>'.
            '<th scope="row ">'.$user->id.'</td>'.
            '<td>'.$user->name.'</td>'.
            '<td>'.$user->user_role.'</td>'.
            '<td>'.$user->email.'</td>'.
            '<td>'.$user->phone_number.'</td>
            <td>
             <a href="/user/update/'.$user->id.'"><button type="button" class="btn btn-warning">Update</button></a>
             <a href="/deleteuser/'.$user->id.'"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>'.
            '</tr>';
            }
            return Response($output);
            }
        }
    }

    function adminLogin(Request $request)
    {
        //dd($request->all());
        if (Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]))
          {
            return redirect('/admin');
          }
    }
    public function Logout(Request $req)
    {
        Auth::logout();
        return redirect('/');
    }
    function St_view($id){
        $user=User::find($id);
        return view('admin.user_forms')->with('user',$user);
    }
    function update_user(Request $req,$id){
        $req->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => 'required|min:6',
            'phone_number'=>'required|min:6',
            'Image' => 'required |mimes:jpeg,bmp,png',
            'address'=>'required',
            
        ]);
        User::where('id',$id)->update([
            'name'=>$req['name'],
            'address'=>$req['address'],
            'email'=>$req['email'],
            'image'=>$req['Image'],
            'phone_number'=>$req['phone_number'],
            'password'=>bcrypt($req['phone_number'])
        ]);
        return redirect('/admin/users');
    }
    function delete_user($id){
        $user = User::find($id);    
        $user->delete();
        return redirect('/admin/users');
    }
    function Co_view($id){
        $course=courses::find($id);
        $subjects=Subject::all();
        return view('admin.courses_forms')->with('course',$course)->with('subjects',$subjects);
    }
    function update_course(Request $req,$id){
        $req->validate([
            'Tittle' => '',
            'Description' => '',
            'Duration' => 'numeric',
            'Modules' => 'numeric',
            'URL'=>'',
            'Image' => 'mimes:jpeg,bmp,png',
        ]);

        
        //
        $course = courses::find($id);
        $course->title = $req['Tittle'];
        $course->description = $req['Description'];
        $course->duration = $req['Duration'];
        $course->modules = $req['Modules'];
        $course->url = $req['URL'];
        if($req['Image']!=null)
        {
        $path_i = $req->file('Image')->store('image', ['disk' =>'my_files']);
        $course->image=$path_i;
        }
        if($req['video']!=null)
        {
            $path_v = $req->file('video')->store('videos', ['disk' =>'my_files']);
            $course->video_path= $path_v;
        }
        $course->save();
        return redirect('/admin/courses');
    }
    function delete_course($id){
        $courses = courses::find($id);
        $scores=scores::where('Course_id',$id)->delete();
        $enrolls=enrolls::where('course_id',$id)->delete();
        $quizzes=Quiz::where('course_id',$id)->delete();
        $courses->delete();
        return redirect('/admin/courses');
    }
    function en_view($id){
        $enroll=enrolls::find($id);
        return view('admin.enroll_forms')->with('enroll',$enroll);
    }

    function update_enroll(Request $req,$id){
        $req->validate([
            'user_id' => ['required', 'numeric'],
            'c_id' => ['required', 'numeric'],
        ]);
        $course=courses::find($req['c_id']);
        enrolls::where('id',$id)->update([
            'St_id'=>$req['user_id'],
            'course_id'=>$req['c_id'],
            'course_name'=>$course->title,
            'course_image'=>$course->image_path
        ]);
        return redirect('/admin/enrollcourses');
    }
    function delete_enroll($id){
        $en = enrolls::find($id);
        $en->delete();
        return redirect('/admin/enrollcourses');
    } 
    function update_quiz(Request $req,$id){
        $req->validate([
            'q1' => ['required'],
            'q2' => ['required'],
            'q3' => ['required'],
        ]);
        $quiz=Quiz::find($id);
        $quiz->Quiz_1=$req['q1'];
        $quiz->Quiz_2=$req['q2'];
        $quiz->Quiz_3=$req['q3'];
        $quiz->save();
        return redirect('/admin/quizzes');
    }
    function delete_quiz($id){
        $en = Quiz::find($id);
        $en->delete();
        return redirect('/admin/quizzes');
    }
    function update_score(Request $req,$id){
         $req->validate([
            'em' => ['required', 'email'],
            'qm' => ['required', 'numeric'],
            'sc' => ['required', 'numeric'],
         ]);
         
        $score=scores::find($id);
        $score->Email=$req['em'];
        $score->Score=$req['sc'];
        $score->Quiz_num=$req['qm'];
        $score->save();
        return redirect('/admin/scores');
    }
    function delete_score($id){
        $en = scores::find($id);
        $en->delete();
        return redirect('/admin/scores');
    }
}
