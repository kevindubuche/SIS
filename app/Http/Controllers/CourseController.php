<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Repositories\CourseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use Session;
use App\Models\User;
use App\Models\Course;
use App\Models\Admission;
use DB;
use File;
class CourseController extends AppBaseController
{
    /** @var  CourseRepository */
    private $courseRepository;

    public function __construct(CourseRepository $courseRepo)
    {
        $this->courseRepository = $courseRepo;
    }

    /**
     * Display a listing of the Course.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
       
        $courses = $this->courseRepository->all();
        // $user = User::where(['id'=> auth()->user()->id ])->first();
        $user = User::find(auth()->user()->id);
        //  dd($user);

        
        //ADM SEE ALL COURSES
        if($user->role == 1 ){
            // dd('role 1');
            return view('courses.index')
            ->with('courses', $courses);
        }
           //teachers SEE only his courses
         else  if($user->role == 2 ){
            // dd('role 2');
            $courses = Course::where(['created_by'=> $user->id])->get();
            return view('courses.index')
            ->with('courses', $courses);
        }
           //by default student see courses he is asigned to
           else  {
            // dd('role default');
            $student = Admission::where(['user_id'=> $user->id])->first();
            // dd($user->id);
            $courses = DB::table('courses')//on pprend tous les cours
            ->select(
                'courses.*'
            )            
            ->join('class_schedulings','class_schedulings.course_id','=','courses.course_id')//qui sont dans l'horaire de l'etudiant
            ->where('class_id',$student->class_id)
           ->get();

        //    dd($courses);
           return view('courses.index')
            ->with('courses', $courses);
        }
       
    }

    /**
     * Show the form for creating a new Course.
     *
     * @return Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created Course in storage.
     *
     * @param CreateCourseRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
        //GESTION DU FICHIER
        $file = $request->file('filename');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $fullPath = $filename;

        $request->file('filename')->move(
            base_path() . '/public/course_files/', $filename
        );
 
        $cours = new Course;
        $cours->course_name = $request->course_name;
        $cours->course_code = $request->course_code;
        $cours->description = $request->description;
        $cours->created_by = $request->created_by;
        $cours->filename = $fullPath;
//  dd($input);
        $cours->save();
       
        // $course = $this->courseRepository->create($input);

        Flash::success('Coursenregistre avec succes.');

        return redirect(route('courses.index'));
    }

    /**
     * Display the specified Course.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            Flash::error('Course not found');

            return redirect(route('courses.index'));
        }

        return view('courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified Course.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            Flash::error('Course not found');

            return redirect(route('courses.index'));
        }

        return view('courses.edit')->with('course', $course);
    }

    /**
     * Update the specified Course in storage.
     *
     * @param int $id
     * @param UpdateCourseRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $course = $this->courseRepository->find($id);

       
        if (empty($course)) {
            Flash::error('Cours non trouve');

            return redirect(route('courses.index'));
        }
        File::delete(public_path().'/course_files/'.$course->filename);
       
        $file = $request->file('filename');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $fullPath = $filename;

        $request->file('filename')->move(
            base_path() . '/public/course_files/', $filename
        );

        $newCourse = array(
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
            'description' => $request->description,
            'created_by' => $request->created_by,
            'filename' => $request->fullPath
        );
       
        Course::findOrFail($id)->update($newCourse);
        // $course = $this->courseRepository->update($request->all(), $id);

        Flash::success('Cours modifie avec succes.');

        return redirect(route('courses.index'));
    }

    /**
     * Remove the specified Course from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $course = $this->courseRepository->find($id);

        if (empty($course)) {
            Flash::error('Course not found');

            return redirect(route('courses.index'));
        }

        $this->courseRepository->delete($id);

        Flash::success('Cours supprimee avec succes.');

        return redirect(route('courses.index'));
    }
}
