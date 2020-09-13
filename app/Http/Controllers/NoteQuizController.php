<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNoteQuizRequest;
use App\Http\Requests\UpdateNoteQuizRequest;
use App\Repositories\NoteQuizRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\NoteQuiz;
use App\user;
use App\Models\Admission;

class NoteQuizController extends AppBaseController
{
    /** @var  NoteQuizRepository */
    private $noteQuizRepository;

    public function __construct(NoteQuizRepository $noteQuizRepo)
    {
        $this->noteQuizRepository = $noteQuizRepo;
    }

    /**
     * Display a listing of the NoteQuiz.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $noteQuizzes = $this->noteQuizRepository->all();

        // return view('note_quizzes.index')
        //     ->with('noteQuizzes', $noteQuizzes);
        $noteQuizzes = $this->noteQuizRepository->all();
        $user = User::find(auth()->user()->id);
        //ADM SEE ALL COURSES
        if($user->role == 1 ){
            return view('note_quizzes.index')
            ->with('noteQuizzes', $noteQuizzes);
        }
           
          else if($user->role == 3 )  {
            $student = Admission::where(['user_id'=> $user->id])->first();
            $noteQuizzes = NoteQuiz::where(['id_student'=> $student->user_id])->get();
            return view('note_quizzes.index')
            ->with('noteQuizzes', $noteQuizzes);
        }


    }

    /**
     * Show the form for creating a new NoteQuiz.
     *
     * @return Response
     */
    public function create()
    {
        return view('note_quizzes.create');
    }

    /**
     * Store a newly created NoteQuiz in storage.
     *
     * @param CreateNoteQuizRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //$input = $request->all();
        $noteQuiz = new NoteQuiz;
        $noteQuiz->id_student = $request->student_id;
        $noteQuiz->quiz_id = $request->quiz_id;
        $noteQuiz->score = $request->score;

        $noteQuiz->save();

         //$noteQuiz = $this->noteQuizRepository->create($input);
        return  response()->json($noteQuiz);
        // Flash::success('Note Quiz saved successfully.');

        // return redirect(route('noteQuizzes.index'));
    }

    /**
     * Display the specified NoteQuiz.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $noteQuiz = $this->noteQuizRepository->find($id);

        if (empty($noteQuiz)) {
            Flash::error('Quizz introuvable!');

            return redirect(route('noteQuizzes.index'));
        }

        return view('note_quizzes.show')->with('noteQuiz', $noteQuiz);
    }

    /**
     * Show the form for editing the specified NoteQuiz.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $noteQuiz = $this->noteQuizRepository->find($id);

        if (empty($noteQuiz)) {
            Flash::error('Quizz introuvable!');

            return redirect(route('noteQuizzes.index'));
        }

        return view('note_quizzes.edit')->with('noteQuiz', $noteQuiz);
    }

    /**
     * Update the specified NoteQuiz in storage.
     *
     * @param int $id
     * @param UpdateNoteQuizRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNoteQuizRequest $request)
    {
        $noteQuiz = $this->noteQuizRepository->find($id);

        if (empty($noteQuiz)) {
            Flash::error('Quizz introuvable!');

            return redirect(route('noteQuizzes.index'));
        }

        $noteQuiz = $this->noteQuizRepository->update($request->all(), $id);

        Flash::success('Quizz modifié avec succès!');

        return redirect(route('noteQuizzes.index'));
    }

    /**
     * Remove the specified NoteQuiz from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $noteQuiz = $this->noteQuizRepository->find($id);

        if (empty($noteQuiz)) {
            Flash::error('Quizz introuvable!');

            return redirect(route('noteQuizzes.index'));
        }

        $this->noteQuizRepository->delete($id);

        Flash::success('Quizz supprimé avec succès!');

        return redirect(route('noteQuizzes.index'));
    }
}
