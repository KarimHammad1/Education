<?php

use Illuminate\Support\Facades\Route;
use App\Mail\TutorMail;
use App\Http\Controllers\MailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('contact-us', function(){
    return view('contact1');
});

Route::get('/','App\Http\Controllers\homeController@index');
Route::get('/about','App\Http\Controllers\aboutController@index');
Route::get('/contact','App\Http\Controllers\contactController@index');
Route::get('/categories','App\Http\Controllers\coursesController@index');
Route::POST('/register','App\Http\Controllers\homeController@store');
Route::POST('/Login','App\Http\Controllers\homeController@dologin');
Route::POST('/review','App\Http\Controllers\contactController@storerev');
Route::get('/subject/{id?}','App\Http\Controllers\coursesController@courses');
Route::get('/courseInfo/{id}','App\Http\Controllers\enrollController@index');
Route::get('/Teachers','App\Http\Controllers\TutorController@index');
Route::POST('/send-mail','App\Http\Controllers\MailController@ContactMail');
Route::get('/new_pass','App\Http\Controllers\PasswordController@index');
Route::POST('/update_pass','App\Http\Controllers\PasswordController@change_pass');

Route::get('/profile','App\Http\Controllers\ProfileController@index');
Route::POST('/update_profile','App\Http\Controllers\ProfileController@update');
//Student
Route::group(['middleware' => 'App\Http\Middleware\Student'], function()
{
Route::get('/getcertificate/{id}','App\Http\Controllers\PdfController@create');
Route::POST('/enroll/course/{id}','App\Http\Controllers\enrollController@store');
Route::get('/mylearning','App\Http\Controllers\mylearningController@index');
Route::get('/drop_course/{id}','App\Http\Controllers\enrollController@drop_course');
}
);
//teacher
Route::group(['middleware' => 'teacher'], function()
{
    Route::get('/teacher','App\Http\Controllers\teacherController@index');
    Route::get('/teachers/courses','App\Http\Controllers\teacherController@CourseIndex');
    Route::get('/teacher/addCourse','App\Http\Controllers\teacherController@addingCourseIndex');
    Route::POST('/teacher/add','App\Http\Controllers\teacherController@storeCourse');
    Route::get('/course/{course}','App\Http\Controllers\teacherController@edit');
    Route::POST('/teacher/update/{id}','App\Http\Controllers\teacherController@update');
    Route::POST('/coursedel/{id}','App\Http\Controllers\teacherController@delete');
    Route::get('/Quiz/{id}','App\Http\Controllers\QuizController@index');
    Route::POST('/add_quiz/{id}','App\Http\Controllers\QuizController@store');
    Route::POST('/update_quiz/{id}','App\Http\Controllers\QuizController@update_quiz');
    Route::get('/delete_quiz/{id}','App\Http\Controllers\QuizController@delete_quiz');
    Route::get('/Scores/{id}','App\Http\Controllers\ScoreController@index');
    Route::POST('/add_score/{id}','App\Http\Controllers\ScoreController@store');
    Route::get('/update/{id}','App\Http\Controllers\ScoreController@index_update');
    Route::POST('/update_score/{id}','App\Http\Controllers\ScoreController@update');
    Route::get('/delete/{id}','App\Http\Controllers\ScoreController@delete');
});

    Route::get('/Logout','App\Http\Controllers\homeController@Logout');
//admin

Route::get('/system/login','App\Http\Controllers\AdminController@login_index');
Route::POST('/adminlogin','App\Http\Controllers\AdminController@adminLogin');

Route::group(['middleware' => 'admin'], function()
{
//views
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/admin/users','App\Http\Controllers\AdminController@Users');
Route::get('/admin/teachers','App\Http\Controllers\AdminController@Teachers');
Route::get('/admin/courses','App\Http\Controllers\AdminController@Courses');
Route::get('/admin/enrollcourses','App\Http\Controllers\AdminController@EnrollCourses');
Route::get('/admin/quizzes','App\Http\Controllers\AdminController@Quiz');
Route::get('/admin/scores','App\Http\Controllers\AdminController@Scores');
// user crud operation
Route::POST('/addTeacher','App\Http\Controllers\AdminController@addTeacher');
Route::get('/user/update/{id}','App\Http\Controllers\AdminController@St_view');
Route::post('/updateuser/{id}','App\Http\Controllers\AdminController@update_user');
Route::get('/deleteuser/{id}','App\Http\Controllers\AdminController@delete_user');
Route::GET('/search','App\Http\Controllers\AdminController@search');

//courses crud operation
Route::get('/courses/update/{id}','App\Http\Controllers\AdminController@Co_view');
Route::post('/courseupdate/{id}','App\Http\Controllers\AdminController@update_course');
Route::get('/deletecourse/{id}','App\Http\Controllers\AdminController@delete_course');
//enroll crud operations
Route::get('/enroll/update/{id}','App\Http\Controllers\AdminController@en_view');
Route::post('/updateenroll/{id}','App\Http\Controllers\AdminController@update_enroll');
Route::get('/deleteenroll/{id}','App\Http\Controllers\AdminController@delete_enroll');
//quiz crud operations
Route::get('/quiz/update/{id}','App\Http\Controllers\AdminController@q_view');
Route::post('/updatequiz/{id}','App\Http\Controllers\AdminController@update_quiz');
Route::get('/deletequiz/{id}','App\Http\Controllers\AdminController@delete_quiz');
//Scores crud operations
Route::get('/score/update/{id}','App\Http\Controllers\AdminController@sc_view');
Route::post('/updatescore/{id}','App\Http\Controllers\AdminController@update_score');
Route::get('/deletescore/{id}','App\Http\Controllers\AdminController@delete_score');

//signout
Route::get('/signout','App\Http\Controllers\AdminController@logout');
});