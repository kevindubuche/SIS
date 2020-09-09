<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;
use App\Repositories\MatiereRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Course;
use App\User;
use App\Models\Matiere;
use App\Models\Admission;

class MatiereController extends AppBaseController
{
    /** @var  MatiereRepository */
    private $matiereRepository;

    public function __construct(MatiereRepository $matiereRepo)
    {
        $this->matiereRepository = $matiereRepo;
    }

    /**
     * Display a listing of the Matiere.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $matieres = $this->matiereRepository->all();
        $user = User::find(auth()->user()->id);
        //ADM SEE ALL COURSES
        if($user->role == 1 ){
            return view('matieres.index')
            ->with('matieres', $matieres);
        }
           //teachers SEE only his courses
           else  if($user->role == 2 ){
            $matieres = Matiere::where(['teacher_id'=> $user->id])->get();
            return view('matieres.index')
            ->with('matieres', $matieres);
        }
          else  {
            $student = Admission::where(['user_id'=> $user->id])->first();
            $matieres = Matiere::where(['class_id'=> $student->class_id])->get();
            return view('matieres.index')
            ->with('matieres', $matieres);
        }
       

    }

    /**
     * Show the form for creating a new Matiere.
     *
     * @return Response
     */
    public function create()
    {
        $allClasses = Classes::all();
        $allTeachers = Teacher::all();

        return view('matieres.create', compact('allClasses', 'allTeachers'));
    }

    /**
     * Store a newly created Matiere in storage.
     *
     * @param CreateMatiereRequest $request
     *
     * @return Response
     */
    public function store(CreateMatiereRequest $request)
    {
        $input = $request->all();

        $matiere = $this->matiereRepository->create($input);

        Flash::success('Matière enregistrée avec succès.');

        return redirect(route('matieres.index'));
    }

    /**
     * Display the specified Matiere.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matiere = $this->matiereRepository->find($id);
        $courses = Course::where('matiere_id',$id)->get();

        if (empty($matiere)) {
            Flash::error('Matière introuvable');

            return redirect(route('matieres.index'));
        }

        return view('matieres.show', compact('courses'))->with('matiere', $matiere);
    }

    /**
     * Show the form for editing the specified Matiere.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matiere = $this->matiereRepository->find($id);
        $allClasses = Classes::all();
        $allTeachers = Teacher::all();

        if (empty($matiere)) {
            Flash::error('Matière introuvable');

            return redirect(route('matieres.index'));
        }

        return view('matieres.edit', compact('allClasses', 'allTeachers'))->with('matiere', $matiere);
    }

    /**
     * Update the specified Matiere in storage.
     *
     * @param int $id
     * @param UpdateMatiereRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatiereRequest $request)
    {
        $matiere = $this->matiereRepository->find($id);

        if (empty($matiere)) {
            Flash::error('Matière introuvable');

            return redirect(route('matieres.index'));
        }

        $matiere = $this->matiereRepository->update($request->all(), $id);

        Flash::success('Matière modifiée avec succès.');

        return redirect(route('matieres.index'));
    }

    /**
     * Remove the specified Matiere from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matiere = $this->matiereRepository->find($id);

        if (empty($matiere)) {
            Flash::error('Matière introuvable');

            return redirect(route('matieres.index'));
        }

        $this->matiereRepository->delete($id);

        //suppression des cours lie a cette matiere
        $courses = Course::where('matiere_id',$id)->get();
        foreach($courses as $cours){
            $cours->delete($cours->course_id);
        }

        Flash::success('Matière supprimée avec succès.');

        return redirect(route('matieres.index'));
    }
}
