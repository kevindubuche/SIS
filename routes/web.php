<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['studentSession']], function(){
    //we pass all our student routes
    //if the student is login he will see all this
    Route::match(['get','post'], 'account','StudentController@account');

    Route::match(['get','post'], 'account','StudentController@account');
    Route::match(['get','post'], 'student-biodata','StudentController@studentBiodata');
    Route::match(['get','post'], 'student-lecture-calendar','StudentController@studentLectureCalendar');
    Route::match(['get','post'], 'student-lecture-activity','StudentController@studentLectureActivity');
    Route::match(['get','post'], 'student-exam-marks','StudentController@studentExamMarks');
   
    Route::match(['get','post'], '/verify-password','StudentController@verifyPassword');
    Route::match(['get', 'post'], '/student-update-password', 'StudentController@changePassword');
});

Route::get('/student','StudentController@studentLogin');

Route::get('/logout','StudentController@studentLogout');

Route::post('/student-login', 'StudentController@LoginStudent');

//forgot password routes
Route::get('/student-forget-password', 'StudentController@getForgotPassword');
Route::post('/forgot-password', 'StudentController@ForgotPassword');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');





Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::group(['middleware' => ['ifLogin']], function(){

Route::resource('classes', 'ClassesController');

Route::resource('classrooms', 'ClassroomController');

Route::resource('levels', 'LevelController');

Route::resource('batches', 'BatchController');

Route::resource('shifts', 'ShiftController');

Route::resource('courses', 'CourseController');

Route::resource('times', 'TimeController');

Route::resource('faculties', 'FacultyController');

Route::resource('attendances', 'AttendanceController');

Route::resource('academics', 'AcademicController');

Route::resource('days', 'DayController');

Route::resource('classAssignings', 'ClassAssigningController');

Route::resource('classSchedulings', 'ClassSchedulingController');

Route::resource('transactions', 'TransactionsController');

Route::resource('admissions', 'AdmissionController');

Route::resource('teachers', 'TeacherController');

Route::resource('roles', 'RoleController');

Route::resource('users', 'UserController');
Route::get('/profile/{id}', 'UserController@profile');


Route::resource('semesters', 'SemesterController');

//////////////////////////////////
Route::get('/dynamicLevel', ['as'=> 'dynamicLevel','uses'=>
'ClassSchedulingController@DynamicLevel']); 

Route::get('/classSchedulingsEdit', ['as'=> 'edit','uses'=>
'ClassSchedulingController@edit']); 

// Route::post('/classSchedulings/update', ['as'=>'update', 'uses'=>
// 'ClassSchedulingController@update']); 

Route::resource('departements', 'DepartementController');

Route::post('/insert', array('as'=>'insert', 'uses'=>'ClassAssigningController@insert') );

Route::resource('statuses', 'StatusController');

// --------------PDF class assigning-----------
Route::get('/pdf-download-class-assign', 'ClassAssigningController@PDFGenerator');

Route::post('/userUpdatePassword','UserController@userUpdatePassword');

});

