<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Actus;
use App\Models\Course;
use App\Models\Admission;
use App\Models\Teacher;
use App\Models\Role;
use App\User;
use App\Models\Classes;
use App\Models\Exam;
use App\Models\Matiere;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
         //ADM SEE ALL ACTU
         if($user->role == 1 ){
            $totalMatieres = Matiere::get()->count();
           $totalStudents = Admission::get()->count();
            $totalTeachers = Teacher::get()->count();
        }
        else  if($user->role == 2 ){
            $totalMatieres = Matiere::where('teacher_id',auth()->user()->id)
            ->count();
            $totalStudents = Admission::join('class_assignings','class_assignings.class_id','admissions.class_id')
            ->where('class_assignings.teacher_id',auth()->user()->id)->count();
            $totalTeachers = Teacher::get()->count();
        }
     else  if($user->role == 3 ){
                $eleve = Admission::where('user_id',auth()->user()->id)->first();
     
                $totalMatieres = Matiere::where('class_id',$eleve->class_id)->count();
         
                $totalStudents = Admission::where('class_id',$eleve->class_id)->count();
                $totalTeachers = Teacher::join('class_assignings','class_assignings.teacher_id','teachers.user_id')
                                 ->where('class_assignings.class_id',$eleve->class_id)->count();
               

            
            }
        

        $totalRoles = Role::get()->count();
        $totalUsers = User::get()->count();
        $totalClasses = Classes::get()->count();
        $totalExamens = Exam::get()->count();
        // $totalDepartements = Departement::get()->count();

        $actuses = Actus::all();
          /// #######  start usefull function
          function IsAdm($id){
            $SearchUser = User::find($id);
            if($SearchUser){
                if($SearchUser->role == 1){
                    return true;
                }
            }
            return false;
        }
         /// #######  end usefull function

    // $actuses = $this->actusRepository->all();

    $user = User::find(auth()->user()->id);
          //ADM SEE ALL ACTU
        //   if($user->role == 1 ){
        //     return view('actuses.index')
        //     ->with('actuses', $actuses);
        // }
     //teachers SEE only MESAJ YO KREYE AK MESAj ADM KREYE
       if($user->role == 2 ){
       
        // dd('role 2');
        $actuAdm = collect();
        foreach($actuses as $actu){
            if(IsAdm($actu->created_by)){
                $actuAdm->push($actu);
            }
        }
     
        
        $actuTeacher = Actus::where(['created_by'=> $user->id])->get();
        $actuses = $actuAdm->merge($actuTeacher);
        // return view('actuses.index')
        // ->with('actuses', $actuses);
    }

    //ELEVE we si actu a assigner a classe li
    else if($user->role == 3 ) {
       
        // dd('role default');
        $student = Admission::where(['user_id'=> $user->id])->first();
        //  dd($student->first_name);
        $actuses = Actus::join('actu_assignings','actu_assignings.actu_id','=','actus.actu_id')//qui sont dans l'horaire de l'etudiant
        ->where('class_id',$student->class_id)
        ->select('actus.*')
        ->get();

    //    $actuAdm = collect();
    //    foreach($actuses as $actu){
    //        if(IsAdm($actu->created_by)){
    //            $actuAdm->push($actu);
    //        }
    //    }

    //    $actuses = $actuAdm->merge($actuTeacher);


    // return view('actuses.index')
    //     ->with('actuses', $actuTeacher);
    }
     
        
        return view('home', compact('actuses',
            'totalMatieres', 'totalStudents', 'totalTeachers','totalRoles','totalUsers',
           'totalClasses','totalExamens'));
    }
}
