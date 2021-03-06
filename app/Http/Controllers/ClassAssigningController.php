<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassAssigningRequest;
use App\Http\Requests\UpdateClassAssigningRequest;
use App\Repositories\ClassAssigningRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Teacher;
use App\Models\ClassScheduling;
use App\Models\Status;
use App\Models\Classes;
use DB;
use Validator;
use App\Models\ClassAssigning;
use PDF;


class ClassAssigningController extends AppBaseController
{
    /** @var  ClassAssigningRepository */
    private $classAssigningRepository;

    public function __construct(ClassAssigningRepository $classAssigningRepo)
    {
        $this->classAssigningRepository = $classAssigningRepo;
    }

    /**
     * Display a listing of the ClassAssigning.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $classAssignings = $this->classAssigningRepository->all();

        $allTeacher = Teacher::get();
        // $classSchedules = ClassScheduling::all();
        $classes = Classes::all();
        return view('class_assignings.index', compact('allTeacher','classes'))
            ->with('classAssignings', $classAssignings);

    }
    
    public function insert(Request $request)
    {
    //  dd($request->all());
        $validator = Validator::make($request->all(),[
            'teacher_id'=>'required'
        ]);

        if($validator->fails()) {
            Flash::error('Professeur incorrect');
               
            return redirect(route('classAssignings.index'));
        }
        $input = $request->all();
        
        // $teacher = new Status;
        // $teacher->teacher_id = $request->teacher_id;
        // $status_id = $teacher->save();
        // if($status_id !=0){
            if( ! $request->multiclass){
                Flash::error('Classe incorecte');
               
                return redirect(route('classAssignings.index'));
            }
            
            foreach($request->multiclass as $key => $teach){
                $data2 = array('teacher_id'=> $request->teacher_id,
                'class_id'=> $request->multiclass[$key]);
                // dd( $request->multiclass[$key]);

            $checkExist = ClassAssigning::where('teacher_id', $request->teacher_id)
                            ->where('class_id', $request->multiclass[$key])
                            ->first();

            if($checkExist){
                Flash::error('Une ou plusieurs assignations existaient deja pour cette classe.');
                return redirect(route('classAssignings.index'));
            }
            ClassAssigning::insert($data2);

            // }
        }
        Flash::success('Assignation faite avec succes');
        return redirect(route('classAssignings.index'));

    }

    // public function classassingin_validation(){
    //     $rules = [
    //         'teacher_id'=> 'required'
    //     ];
    // }
    /**
     * Show the form for creating a new ClassAssigning.
     *
     * @return Response
     */
    public function create()
    {
        return view('class_assignings.create');
    }

    /**
     * Store a newly created ClassAssigning in storage.
     *
     * @param CreateClassAssigningRequest $request
     *
     * @return Response
     */
    public function store(CreateClassAssigningRequest $request)
    {
       
        $input = $request->all();

        $classAssigning = $this->classAssigningRepository->create($input);

        Flash::success('Class Assigning saved successfully.');

        return redirect(route('classAssignings.index'));
    }

    /**
     * Display the specified ClassAssigning.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $classAssigning = $this->classAssigningRepository->find($id);

        if (empty($classAssigning)) {
            Flash::error('Class Assigning not found');

            return redirect(route('classAssignings.index'));
        }

        return view('class_assignings.show')->with('classAssigning', $classAssigning);
    }

    /**
     * Show the form for editing the specified ClassAssigning.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $classAssigning = $this->classAssigningRepository->find($id);

        if (empty($classAssigning)) {
            Flash::error('Class Assigning not found');

            return redirect(route('classAssignings.index'));
        }

        return view('class_assignings.edit')->with('classAssigning', $classAssigning);
    }

    /**
     * Update the specified ClassAssigning in storage.
     *
     * @param int $id
     * @param UpdateClassAssigningRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClassAssigningRequest $request)
    {
        $classAssigning = $this->classAssigningRepository->find($id);

        if (empty($classAssigning)) {
            Flash::error('Class Assigning not found');

            return redirect(route('classAssignings.index'));
        }

        $classAssigning = $this->classAssigningRepository->update($request->all(), $id);

        Flash::success('Class Assigning updated successfully.');

        return redirect(route('classAssignings.index'));
    }

    /**
     * Remove the specified ClassAssigning from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $classAssigning = $this->classAssigningRepository->find($id);

        if (empty($classAssigning)) {
            Flash::error('Class Assigning not found');

            return redirect(route('classAssignings.index'));
        }

        $this->classAssigningRepository->delete($id);

        Flash::success('Assignation suprimmee avec succes.');

        return redirect(route('classAssignings.index'));
    }
    
    public function PDFGenerator(Request $request){
        $classAssignings = ClassAssigning::join('teachers', 'teachers.user_id','=','class_assignings.teacher_id')
        ->join('classes', 'classes.class_id','=','class_assignings.class_id')
        ->get();
// dd($classAssignings);
        $dompdf = PDF::loadview('class_assignings.pdf', ['classAssignings' => $classAssignings]);
        $dompdf->setPaper('A4','landscape');
        $dompdf->stream();

        return $dompdf->download('Assignations.pdf');

    }
}
