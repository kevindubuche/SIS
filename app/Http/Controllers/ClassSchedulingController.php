<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassSchedulingRequest;
use App\Http\Requests\UpdateClassSchedulingRequest;
use App\Repositories\ClassSchedulingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Batch;
use App\Models\Classes;
use App\Models\Classroom; 
use App\Models\Course; 
use App\Models\Day; 
use App\Models\Level; 
use App\Models\Semester;
use App\Models\Shift;
use App\Models\Time; 
use App\Models\Teacher;

use App\Models\ClassScheduling;

use DB;
class ClassSchedulingController extends AppBaseController
{
    /** @var  ClassSchedulingRepository */
    private $classSchedulingRepository;

    public function __construct(ClassSchedulingRepository $classSchedulingRepo)
    {
        $this->classSchedulingRepository = $classSchedulingRepo;
    }

    /**
     * Display a listing of the ClassScheduling.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        $allClasses = Classes::all();
        $allCourses = Course::all();
        $allSemesters = Semester::all();
        $allTeachers = Teacher::all();
        $classSchedule = ClassScheduling::all();


        // $classSchedulings = $this->classSchedulingRepository->all();

        //////////////////////////////////////
        //AL DEYE TOUT TOUT SCHEDULE AK AK INFO KORESPONDAN YO
        //  $classSchedule = DB::table('class_schedulings')
        //     ->select(
        //         'class_schedulings.*',
        //          'classes.*',
        //         'courses.*',
        //          'semesters.*'
        //     )
        //     ->where('class_schedulings.deleted_at')
        //     ->join('courses','courses.course_id','=','class_schedulings.course_id')
        //     ->join('classes','classes.class_id','=','class_schedulings.class_id')
        //     ->join('semesters','semesters.semester_id','=','class_schedulings.semester_id')
        //     ->get();
            return view('class_schedulings.index',
            compact('classSchedule', 'allCourses', 'allClasses', 'allSemesters', 'allTeachers'))
            // ->with('classSchedulings', $classSchedulings)
            ;
    }

    public function DynamicLevel(Request $request){
        $course_id = $request->get('course_id');

        $levels = Level::where('course_id', '=',$course_id)->get();
       
        return  Response::json($levels);
    }
    /**
     * Show the form for creating a new ClassScheduling.
     *
     * @return Response
     */
    public function create()
    {
        return view('class_schedulings.create');
    }

    /**
     * Store a newly created ClassScheduling in storage.
     *
     * @param CreateClassSchedulingRequest $request
     *
     * @return Response
     */
    public function store(CreateClassSchedulingRequest $request)
    {
        $input = $request->all();
        //   dd($input);
        $count = ClassScheduling::where('class_id',$input['class_id'])
        ->where( 'course_id', $input['course_id'])
        ->where('semester_id',$input['semester_id'])->get()->count();

        if($count != 0){
            Flash::error('Evenement deja dans l\'horaire.');

        return redirect(route('classSchedulings.index'));
        }
        else{
             $classScheduling = $this->classSchedulingRepository->create($input);

        Flash::success('Opération effectuée avec succes.');

        return redirect(route('classSchedulings.index'));
        }
       
    }

    /**
     * Display the specified ClassScheduling.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $classScheduling = $this->classSchedulingRepository->find($id);

        if (empty($classScheduling)) {
            Flash::error('Class Scheduling not found');

            return redirect(route('classSchedulings.index'));
        }

        return view('class_schedulings.show')->with('classScheduling', $classScheduling);
    }

    /**
     * Show the form for editing the specified ClassScheduling.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(Request $request)
    {
        $data=$this->classSchedulingRepository->find($request->id);
        // dd($data);
        if($request->ajax()){
            return response($data);
        }
        
        // $classScheduling = $this->classSchedulingRepository->find($id);

        // if (empty($classScheduling)) {
        //     Flash::error('Class Scheduling not found');

        //     return redirect(route('classSchedulings.index'));
        // }

        // return view('class_schedulings.edit')->with('classScheduling', $classScheduling);
    }

    /**
     * Update the specified ClassScheduling in storage.
     *
     * @param int $id
     * @param UpdateClassSchedulingRequest $request
     *
     * @return Response
     */
    public function update( Request $request)
    {
        $classSchedule = array(
            'class_id'=> $request->class_id3,
            'course_id' => $request->course_id3,
            // 'level_id' => $request->level_id3,
            // 'shift_id' => $request->shift_id3, 
            // 'classroom_id'=> $request->classroom_id3,
            // 'batch_id' => $request->batch_id3,
            // 'day_id' => $request->day_id3,
            // 'time_id' => $request->time_id3,
            'semester_id'=> $request->semester_id3,
            'start_time'=> $request->start_time3,
            'end_time' => $request->end_time3
            // 'status' => $request->status3


        );

        // echo "<pre>"; print_r($classSchedule); die;
        $this->classSchedulingRepository->update($classSchedule, $request->schedule_id3);

        if(empty($classSchedule)){
            Flash::error('Class schedule update failed');
        }
        Flash::success('Opération effectuée avec succes.');
        return redirect()->route('classSchedulings.index');

        // $classScheduling = $this->classSchedulingRepository->find($id);

        // if (empty($classScheduling)) {
        //     Flash::error('Class Scheduling not found');

        //     return redirect(route('classSchedulings.index'));
        // }

        // $classScheduling = $this->classSchedulingRepository->update($request->all(), $id);

        // Flash::success('Class Scheduling updated successfully.');

        // return redirect(route('classSchedulings.index'));
    }

    /**
     * Remove the specified ClassScheduling from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $classScheduling = $this->classSchedulingRepository->find($id);

        if (empty($classScheduling)) {
            Flash::error('Horaire non trouvé');

            return redirect(route('classSchedulings.index'));
        }

        $this->classSchedulingRepository->delete($id);

        Flash::success('Opération effectuée avec succes.');

        return redirect(route('classSchedulings.index'));
    }
}
