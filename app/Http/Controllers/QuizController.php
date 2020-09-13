<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Repositories\QuizRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Quiz_question;
use App\Models\quizProposition;
use App\Models\QuizReponses;
use DB;
use App\Models\Quiz;
use App\Models\Classes;
use App\User;
usE App\Models\Admission;

class QuizController extends AppBaseController
{
    /** @var  QuizRepository */
    private $quizRepository;

    public function __construct(QuizRepository $quizRepo)
    {
        $this->quizRepository = $quizRepo;
    }

    /**
     * Display a listing of the Quiz.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $quizzes = $this->quizRepository->all();
        $user = User::find(auth()->user()->id);
        //ADM SEE ALL COURSES
        if($user->role == 1 ){
            return view('quizzes.index')
            ->with('quizzes', $quizzes);
        }
           
          else if($user->role == 3 )  {
            $student = Admission::where(['user_id'=> $user->id])->first();
            $quizzes = Quiz::where(['class_id'=> $student->class_id])->get();
            return view('quizzes.index')
            ->with('quizzes', $quizzes);
        }
       
    }

    /**
     * Show the form for creating a new Quiz.
     *
     * @return Response
     */
    public function create()
    {
        $allClasses = Classes::all();
        $allCategories = Quiz_question::distinct()->get(['categorie']);
        return view('quizzes.create',compact('allClasses','allCategories'));
    }

    /**
     * Store a newly created Quiz in storage.
     *
     * @param CreateQuizRequest $request
     *
     * @return Response
     */
    public function store(CreateQuizRequest $request)
    {
        $input = $request->all();

        $quiz = $this->quizRepository->create($input);

        Flash::success('Quizz ajouté avec succès!');

        return redirect(route('quizzes.index'));
    }

    /**
     * Display the specified Quiz.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quiz = $this->quizRepository->find($id);

        if (empty($quiz)) {
            Flash::error('Quiz not found');

            return redirect(route('quizzes.index'));
        }

        return view('quizzes.show')->with('quiz', $quiz);
    }

    /**
     * Show the form for editing the specified Quiz.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quiz = $this->quizRepository->find($id);

        if (empty($quiz)) {
            Flash::error('Quiz not found');

            return redirect(route('quizzes.index'));
        }

        return view('quizzes.edit')->with('quiz', $quiz);
    }

    /**
     * Update the specified Quiz in storage.
     *
     * @param int $id
     * @param UpdateQuizRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuizRequest $request)
    {
        $quiz = $this->quizRepository->find($id);

        if (empty($quiz)) {
            Flash::error('Quizz introuvable!');

            return redirect(route('quizzes.index'));
        }

        $quiz = $this->quizRepository->update($request->all(), $id);

        Flash::success('Quizz modifié avec succès!');

        return redirect(route('quizzes.index'));
    }

    /**
     * Remove the specified Quiz from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quiz = $this->quizRepository->find($id);

        if (empty($quiz)) {
            Flash::error('Quizz introuvable!');

            return redirect(route('quizzes.index'));
        }

        $this->quizRepository->delete($id);

        Flash::success('Quizz modifié avec succès!');

        return redirect(route('quizzes.index'));
    }

    public function startQuiz( Request $request )
    {
        
        //$request->get('id_quiz')
        //$request->get('nombre_questions')
        $quiz_id = $request->quiz_id;
         $leQuiz = Quiz::where(['quiz_id' => $quiz_id])->first();
          $categorie = $leQuiz->categorie;
        $quiz= array();
    // $questions=  Quiz_question::all()->random(1);
    $questions = Quiz_question::where('categorie',$categorie)->get()->random($leQuiz->nombre_questions);
    foreach($questions as $uneQuestion){
        $quiz['question'][] =array(
            'id_question'=>$uneQuestion->id_question,
            'content'=>$uneQuestion->content,
            'proposition'=> quizProposition::where('id_question',$uneQuestion->id_question)->get(),
                    
        ) ;
    }
      return  response()->json($quiz);
    }

    public function endQuiz( Request $request )
    {
        $lesReponses=[];
        foreach($request->lesID as $id){
            $lesReponses[]=QuizReponses::where('id_question',$id)->get();
        }
        return response()->json($lesReponses);
    }
}
