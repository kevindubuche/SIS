<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Actus;
use App\Models\Course;
use App\Models\Admission;
use App\Models\Teacher;

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

        $allActus = Actus::all();

     
        
        return view('home', compact('allActus',
            'totalCourses', 'totalStudents', 'totalTeachers'));
    }
}
