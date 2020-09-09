<?php

namespace App\Https\Controllers;

use App\Https\Requests\CreateSemesterRequest;
use App\Https\Requests\UpdateSemesterRequest;
use App\Repositories\SemesterRepository;
use App\Https\Controllers\AppBaseController;
use Illuminate\Https\Request;
use Flash;
use Response;
use App\Models\Annee;
use App\Models\Semester;
class SemesterController extends AppBaseController
{
    /** @var  SemesterRepository */
    private $semesterRepository;

    public function __construct(SemesterRepository $semesterRepo)
    {
        $this->semesterRepository = $semesterRepo;
    }

    /**
     * Display a listing of the Semester.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $semesters = $this->semesterRepository->all();

        return view('semesters.index')
            ->with('semesters', $semesters);
    }

    /**
     * Show the form for creating a new Semester.
     *
     * @return Response
     */
    public function create()
    {
        $annees = Annee::all();
        return view('semesters.create',compact('annees'));
    }

    /**
     * Store a newly created Semester in storage.
     *
     * @param CreateSemesterRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();

         

          $semester = new Semester;
        $semester->semester_name = $request->semester_name;
        $semester->semester_duration = $request->semester_duration;
        $semester->semester_year = $request->semester_year;
        $semester->semester_description = $request->semester_description;
        
        $semester->save();
        // $semester = $this->semesterRepository->create($input);

        Flash::success('Etape enregistrée avec succès.');

        return redirect(route('semesters.index'));
    }

    /**
     * Display the specified Semester.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $semester = $this->semesterRepository->find($id);

        if (empty($semester)) {
            Flash::error('Etape introuvable');

            return redirect(route('semesters.index'));
        }

        return view('semesters.show')->with('semester', $semester);
    }

    /**
     * Show the form for editing the specified Semester.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $annees = Annee::all();
        $semester = $this->semesterRepository->find($id);

        if (empty($semester)) {
            Flash::error('Etape introuvable');

            return redirect(route('semesters.index'));
        }

        return view('semesters.edit',compact('annees'))->with('semester', $semester);
    }

    /**
     * Update the specified Semester in storage.
     *
     * @param int $id
     * @param UpdateSemesterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSemesterRequest $request)
    {
        $semester = $this->semesterRepository->find($id);

        if (empty($semester)) {
            Flash::error('Etape non trouvée');

            return redirect(route('semesters.index'));
        }
        // $count = Semester::where('semester_code',$request->semester_code)->count();
        // if($count !=0){
        //     Flash::error('Le code de l\'etape existe deja');
        //     return redirect(route('semesters.index'));
        // }


        $semester = $this->semesterRepository->update($request->all(), $id);

        Flash::success('Etape modifiée avec succès.');

        return redirect(route('semesters.index'));
    }

    /**
     * Remove the specified Semester from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $semester = $this->semesterRepository->find($id);

        if (empty($semester)) {
            Flash::error('Etape introuvable');

            return redirect(route('semesters.index'));
        }

        $this->semesterRepository->delete($id);

        Flash::success('Etape suprimmée avec succès');

        return redirect(route('semesters.index'));
    }
}
