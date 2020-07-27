<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Repositories\ExamRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Course;
use App\Models\Classes;
use App\Models\Exam;
use File;

class ExamController extends AppBaseController
{
    /** @var  ExamRepository */
    private $examRepository;

    public function __construct(ExamRepository $examRepo)
    {
        $this->examRepository = $examRepo;
    }

    /**
     * Display a listing of the Exam.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $exams = $this->examRepository->all();

        $allCourses = Course::all();
        $allClasses = Classes::all();


        return view('exams.index', compact('allCourses','allClasses'))
            ->with('exams', $exams);
    }

    /**
     * Show the form for creating a new Exam.
     *
     * @return Response
     */
    public function create()
    {
        return view('exams.create');
    }

    /**
     * Store a newly created Exam in storage.
     *
     * @param CreateExamRequest $request
     *
     * @return Response
     */
    public function store(CreateExamRequest $request)
    {
        $input = $request->all();
        // dd($input);
        //GESTION DU FICHIER
        $file = $request->file('filename');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $fullPath = $filename;

        $request->file('filename')->move(
            base_path() . '/public/exam_files/', $filename
        );

        $exam = new Exam;
        $exam->title = $request->title;
        $exam->description = $request->description;
        $exam->created_by = $request->created_by;
        $exam->filename = $fullPath;
        $exam->course_id = $request->course_id;
        $exam->class_id = $request->class_id;
//  dd($input);
        $exam->save();
        // $exam = $this->examRepository->create($input);

        Flash::success('Exam saved successfully.');

        return redirect(route('exams.index'));
    }

    /**
     * Display the specified Exam.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $exam = $this->examRepository->find($id);

        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('exams.index'));
        }

        return view('exams.show')->with('exam', $exam);
    }

    /**
     * Show the form for editing the specified Exam.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $exam = $this->examRepository->find($id);

        $allCourses = Course::all();
        $allClasses = Classes::all();

        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('exams.index'));
        }

        return view('exams.edit',compact('allCourses','allClasses'))->with('exam', $exam);
    }

    /**
     * Update the specified Exam in storage.
     *
     * @param int $id
     * @param UpdateExamRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    { 
        $old_exam = $this->examRepository->find($request->exam_id2);
     
         File::delete(public_path().'/exam_files/'.$old_exam->filename);
          
         $file = $request->file('filename');
         $extension = $file->getClientOriginalExtension();
         $filename = time().'.'.$extension;
         $fullPath = $filename;
 
         $request->file('filename')->move(
             base_path() . '/public/exam_files/', $filename
         );
 
        
        //  dd($request->all());
        $exam = array(
            'class_id'=> $request->class_id2,
            'course_id' => $request->course_id2,
            'title'=> $request->title2,
            'description'=> $request->description2,
            'filename'=>$fullPath
        );

        // $exam = $this->examRepository->find($id);
        $this->examRepository->update($exam, $request->exam_id2);


        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('exams.index'));
        }

        // $exam = $this->examRepository->update($request->all(), $id);

        Flash::success('Exam updated successfully.');

        return redirect(route('exams.index'));
    }

    /**
     * Remove the specified Exam from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $exam = $this->examRepository->find($id);

        if (empty($exam)) {
            Flash::error('Exam not found');

            return redirect(route('exams.index'));
        }

        $this->examRepository->delete($id);

        Flash::success('Exam deleted successfully.');

        return redirect(route('exams.index'));
    }
}