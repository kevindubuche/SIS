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
    public function store(CreateSemesterRequest $request)
    {
        $input = $request->all();

        $semester = $this->semesterRepository->create($input);

        Flash::success('Semestre enregistre avec succes.');

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
            Flash::error('Semestre non trouve');

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
            Flash::error('Semestre non trouve');

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
            Flash::error('Semestre non trouve');

            return redirect(route('semesters.index'));
        }

        $semester = $this->semesterRepository->update($request->all(), $id);

        Flash::success('Semestre modifie avec succes.');

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
            Flash::error('Semester not found');

            return redirect(route('semesters.index'));
        }

        $this->semesterRepository->delete($id);

        Flash::success('Semester deleted successfully.');

        return redirect(route('semesters.index'));
    }
}
