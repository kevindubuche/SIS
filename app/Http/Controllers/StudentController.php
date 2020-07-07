<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Roll;
use Flash;
use App\Models\Admission;
use Session;
use Str;
use Mail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function studentBiodata(Request $request)
    {
        $student = Roll::join('admissions', 'admissions.student_id','=', 'rolls.student_id')
        ->where(['username' => Session::get('studentSession')])->first();

        return view('students.lectures.biodata', compact('student'));
    }

    public function studentChooseCourse(Request $request)
    {

        return view('students.lectures.biodata');
    }
    public function studentLectureCalendar(Request $request)
    {

        return view('students.lectures.calendar');
    }
    public function studentLectureActivity(Request $request)
    {

        return view('students.lectures.calendar');
    }

    public function studentLogin(Request $request)
    {
        return view('students.login');
    }
    public function studentLogout()
    {
        // return view('students.login');
    }
    public function LoginStudent(Request $request)
    {
        if($request->isMethod('post')){

            $student = $request->all();
            $studentCount = Roll::where(['username'=>$student['username'],
            'password'=>$student['password']])->count();

            if($studentCount > 0){
                Session::put('studentSession', $student['username']);

                Flash::success('Welcome '.$student['username']);

                return redirect('/account');
            }else{
                Flash::error('Your Username or Passsword is incorect');
                return redirect('/student');//return to login page
            }
        }
        
    }

    public function verifyPassword(Request $request){
        $student = $request->all();
        //ann verifye account la
        $validStudent = Roll::where(['username'=> Session::get('studentSession'), 
        'password' =>$student['old_password']])->count();

        if ($validStudent == 1 ){
            // Flash::success('Your username is correct');
            echo "true"; die;
        }else{
            // Flash::error('Your username is not correct');
            echo "false"; die;
        }

        // return view('students.lectures.biodata',compact('student'));
    }

    public function changePassword(Request $request)
    {

          $student = $request->all();
          $students = Admission::where('email', $student['email'])->first();//sa pa util
        //   dd($students); die;
        $studentCount = Roll::where(['username'=> Session::get('studentSession'),
        'password'=>$student['old_password'] ])->count();
        if ($studentCount == 1 ){
            // valid password and send msg update password
            
            $new_password = $student['new_password'];//this is the new password

            Roll::where('username', Session::get('studentSession'))
            ->update(['password'=>$new_password]);
            //we'll use md5
            //here we can send email
            // dd('okoko');
            Flash::success('You have successfully changed your password');
            return redirect()->back();

        }else{
            // send invalid msg or email not found
            Flash::error('Password failed to update');
            return redirect()->back();
        }
    }

    public function getForgotPassword(){

        return view('students.forget-password');
    }

    //this id is for the post
    public function  ForgotPassword(Request $request){

        $data = $request->all();
        $studentCount = Admission::where('email', $data['email'])->count();
        
        if($studentCount == 0){
            Flash::error('We can\'t find student with that email address...');
            return redirect()->back();
        }
        //mal chache username nan
        $student = Admission::where('email', $data['email'])->first();
$roll = Roll::where('student_id', $student->student_id)->first();

        Session::put('studentSession',$roll->username);
        // dd( Session::get('studentSession'));
        $students = Admission::where('email', $data['email'])->first();
        $rand_password = Str::random(12);

        $new_password =$rand_password;

   $ok=     Roll::where('username',
         Session::get('studentSession'))->update(['password'=>$new_password]);

         $email = $data['email'];
         $student_name = $students->first_name;
         $message =[
              'email'=>$email,
              'first_name' => $student_name,
              'password' =>$rand_password
         ];

         Mail::send('emails.forgot-password', $message,function($message)use($email){
           $message->to($email)->subject('Reset Passord - S I S');
         });

         Flash::success('We have e-mailed your password Reset Link to '.$data['email']);
         return redirect()->back(); 
    }

    public function account()
    {
        if(Session::has('studentSession')){
            $student = Admission::all();
        }else{
            return redirect('/student')->with('error','Please login to acces');
        }
        return view('students.account', compact('student'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
