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
use Youtube;
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
            $courses = Course::join('class_schedulings','class_schedulings.course_id','=','courses.course_id')//qui sont dans l'horaire de l'etudiant
            ->where('class_id',$student->class_id)
           ->get();

            //dd($courses);
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
        // try{
            $input = $request->all();
          
            //GESTION DU FICHIER
            if($request->file('filename')){
                $file = $request->file('filename');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $fullPath = $filename;
        
                $request->file('filename')->move(
                    base_path() . '/public/course_files/', $filename
                );
    
            }
        
    
    
         
        //     if($request->file('video')){
            
        //         //########### start upload to youtube
        //         $video = Youtube::upload($request->file('video')->getPathName(), [
        //           'title'       => $request->input('title_video'),
        //           'description' => $request->input('description_video')
        //       ]);
        //       // return "Video uploaded successfully. Video ID is ". $video->getVideoId();
        //        //########### start upload to youtube
  
        //  }
        $matches = array();
        preg_match(' /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/', $request->videoLink, $matches);
        $match = $matches && strlen($matches[2]) === 11 ? $matches[2] : null;

            $cours = new Course;
            $cours->course_name = $request->course_name;
            $cours->description = $request->description;
            $cours->created_by = $request->created_by;
            $cours->matiere_id = $request->matiere_id;
            $cours->contenu = $request->editordata;
            $cours->videoLink = $match;
            
//             if($request->file('video')){
//   $cours->videoID = $request->link;
//       }
//       else{
//         $cours->videoID = ""; 
//       }
      if($request->file('filename')){
            $cours->filename = $fullPath;
      }else{
        $cours->filename = "";
      }
       
    //  dd($input);
            $cours->save();
    
            // $course = $this->courseRepository->create($input);
    
            Flash::success('Cours enregistre avec succes.');
    
            return redirect()->back();
      //  }
        // catch(\Illuminate\Database\QueryException $e){
        //     //if email  exist before in db redirect with error messages
        //     Flash::error('Cours non enregistre, probleme de connection');
        //     return redirect(route('courses.index'));
        //    }
    
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
        //    dd($request->editordata);
        $course = $this->courseRepository->find($id);
        if (empty($course)) {
            Flash::error('Cours non trouve');

            return redirect(route('courses.index'));
        }
           //GESTION DU FICHIER
           if($request->file('filename')){
               //nap delete ansyen document a
            File::delete(public_path().'/course_files/'.$course->filename);
            // nap jere nouvo a
            $file = $request->file('filename');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $fullPath = $filename;
    
            $request->file('filename')->move(
                base_path() . '/public/course_files/', $filename
            );

        }

    //     if($request->file('video')){
            
    //         //########### start upload to youtube
    //         $video = Youtube::upload($request->file('video')->getPathName(), [
    //           'title'       => $request->input('title_video'),
    //           'description' => $request->input('description_video')
    //       ]);
    //       // return "Video uploaded successfully. Video ID is ". $video->getVideoId();
    //        //########### start upload to youtube

    //  }
     
    //  if($request->file('video')){
    //     $videoID = $video->getVideoId();
    
    //         }
    //         else{
    //           $videoID = ""; 
    //         }
    
    $matches = array();
    preg_match(' /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/', $request->videoLink, $matches);
    $match = $matches && strlen($matches[2]) === 11 ? $matches[2] : null;

            if($request->file('filename')){
                $filename = $fullPath;
          }else{
            $filename = "";
          }
        //   dd($match);
        $newCourse = array(
            'course_name' => $request->course_name,
            'description' => $request->description,
            'created_by' => $request->created_by,
            'filename' => $filename,
            'contenu' => $request->editordata,
            'videoLink' => $match
                   // $course = $this->courseRepository->update($request->all(), $id);

        );
        Course::findOrFail($id)->update($newCourse);
        // $course = $this->courseRepository->update($request->all(), $id);

       
        Flash::success('Cours modifié avec succes.');

        return redirect(route('matieres.index'));
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
            Flash::error('Cours introuvable');

            return redirect(route('courses.index'));
        }

        $this->courseRepository->delete($id);

        Flash::success('Cours supprimée avec succes.');

        return redirect(route('courses.index'));
    }
}
