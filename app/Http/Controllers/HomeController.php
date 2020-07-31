<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Actus;
use App\Models\Course;
use App\Models\Admission;
use App\Models\Teacher;
use App\Models\Role;
use App\Models\User;
use App\Models\Classes;
use App\Models\Exam;
use App\Models\Departement;

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
        $totalCourses = Course::get()->count();
        $totalStudents = Admission::get()->count();
        $totalTeachers = Teacher::get()->count();
        $totalRoles = Role::get()->count();
        $totalUsers = User::get()->count();
        $totalClasses = Classes::get()->count();
        $totalExamens = Exam::get()->count();
        $totalDepartements = Departement::get()->count();

        $allActus = Actus::all();

     
        
        return view('home', compact('allActus',
            'totalCourses', 'totalStudents', 'totalTeachers','totalRoles','totalUsers',
           'totalClasses','totalExamens','totalDepartements'));
    }
}
