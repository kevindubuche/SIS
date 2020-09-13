<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuiz_questionRequest;
use App\Http\Requests\UpdateQuiz_questionRequest;
use App\Repositories\Quiz_questionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Quiz_question;
use App\Models\quizProposition;
use App\Models\QuizReponses;
use App\Models\Classes;

use DB;
class Quiz_questionController extends AppBaseController
{
    /** @var  Quiz_questionRepository */
    private $quizQuestionRepository;

    public function __construct(Quiz_questionRepository $quizQuestionRepo)
    {
        $this->quizQuestionRepository = $quizQuestionRepo;
    }

    /**
     * Display a listing of the Quiz_question.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $quizQuestions = $this->quizQuestionRepository->all();

        return view('quiz_questions.index')
            ->with('quizQuestions', $quizQuestions);
    }

    /**
     * Show the form for creating a new Quiz_question.
     *
     * @return Response
     */
    public function create()
    {
        $allClasses=Classes::all();
        return view('quiz_questions.create', compact("allClasses"));
    }

    /**
     * Store a newly created Quiz_question in storage.
     *
     * @param CreateQuiz_questionRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();

        // $quizQuestion = $this->quizQuestionRepository->create($input);
        $question=new Quiz_question;
        $question->categorie=$request->input('categorie');
        $question->content=$request->input('content');
        $question->class_id=$request->input('class_id');
        $question->save();
       $id_ques = DB::getPdo()->lastInsertId();
        
       // dd($request->input('listPropo'));
        $listProp=explode(",",$request->input('listPropo'));
       // dd($listProp);
        for($i=0; $i< count($listProp) ;$i++){
            $proposition=new quizProposition;
            $proposition->id_question=$id_ques;
            $proposition->content_prop=$listProp[$i];
            $proposition->save();
        }

        $listRep=explode(",",$request->input('listRep'));
        // dd($listProp);
         for($i=0; $i< count($listRep) ;$i++){
             $reponse=new quizReponses;
             $reponse->id_question=$id_ques;
             $reponse->explication=$listRep[$i];
             $reponse->save();
         }

        Flash::success('Question ajoutée avec succès!');

        return redirect(route('quizQuestions.index'));
    }

    /**
     * Display the specified Quiz_question.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quizQuestion = $this->quizQuestionRepository->find($id);

        if (empty($quizQuestion)) {
            Flash::error('Question introuvable!');

            return redirect(route('quizQuestions.index'));
        }

        return view('quiz_questions.show')->with('quizQuestion', $quizQuestion);
    }

    /**
     * Show the form for editing the specified Quiz_question.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // $quizQuestion = $this->quizQuestionRepository->find($id);
        $quizQuestion = Quiz_question::find($id);
        if (empty($quizQuestion)) {
            Flash::error('Question introuvable!');

            return redirect(route('quizQuestions.index'));
        }

        $allClasses=Classes::all();
        return response()->view('quiz_questions.edit',['aQuestion'=>$quizQuestion, 'allClasses'=>$allClasses,
        'reponses'=>quizReponses::where('id_question',$id)->get(), 'propos'=>quizProposition::where('id_question',$id)->get()]);
   


       // return view('quiz_questions.edit')->with('quizQuestion', $quizQuestion);
    }

    /**
     * Update the specified Quiz_question in storage.
     *
     * @param int $id
     * @param UpdateQuiz_questionRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        // $quizQuestion = $this->quizQuestionRepository->find($id);

        // if (empty($quizQuestion)) {
        //     Flash::error('Quiz Question not found');

        //     return redirect(route('quizQuestions.index'));
        // }

        // $quizQuestion = $this->quizQuestionRepository->update($request->all(), $id);
        $question= Quiz_question::find($request->get('id'));
        $question->categorie=$request->get('categorie');
        $question->class_id=$request->get('class_id');
        $question->content=$request->get('content');
        $question->save();
        
        DB::table('quiz_reponses')->where('id_question',$request->get('id'))->delete();
        $listRep=explode(",",$request->input('listRep'));
         for($i=0; $i< count($listRep) ;$i++){
             $reponse=new quizReponses;
             $reponse->id_question=$request->get('id');
             $reponse->explication=$listRep[$i];
             $reponse->save();
         }
        
        DB::table('quiz_propositions')->where('id_question',$request->get('id'))->delete(); 
         $listProp=explode(",",$request->input('listPropo'));
         for($i=0; $i< count($listProp) ;$i++){
             $proposition=new quizProposition;
             $proposition->id_question=$request->get('id');
             $proposition->content_prop=$listProp[$i];
             $proposition->save();
         }
       
        Flash::success('Question modifiée avec succès!');

        return redirect(route('quizQuestions.index'));
    }

    /**
     * Remove the specified Quiz_question from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        // $quizQuestion = $this->quizQuestionRepository->find($id);

        // if (empty($quizQuestion)) {
        //     Flash::error('Quiz Question not found');

        //     return redirect(route('quizQuestions.index'));
        // }

        // $this->quizQuestionRepository->delete($id);

        DB::table('quiz_questions')->where('id_question',$id)->delete();
        DB::table('quiz_propositions')->where('id_question',$id)->delete();
        DB::table('quiz_reponses')->where('id_question',$id)->delete();
       // return redirect()->route('manageQuiz')->with('success','Question deleted');

        Flash::success('Question supprimée avec succès!');

        return redirect(route('quizQuestions.index'));
    }
}
