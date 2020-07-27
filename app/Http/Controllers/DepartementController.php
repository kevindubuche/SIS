<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartementRequest;
use App\Http\Requests\UpdateDepartementRequest;
use App\Repositories\DepartementRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Faculty;

class DepartementController extends AppBaseController
{
    /** @var  DepartementRepository */
    private $departementRepository;

    public function __construct(DepartementRepository $departementRepo)
    {
        $this->departementRepository = $departementRepo;
    }

    /**
     * Display a listing of the Departement.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $faculties = Faculty::all();

        $departements = $this->departementRepository->all();

        return view('departements.index'
        // ,            compact('faculties')
            )
            ->with('departements', $departements);
    }

    /**
     * Show the form for creating a new Departement.
     *
     * @return Response
     */
    public function create()
    {
        return view('departements.create');
    }

    /**
     * Store a newly created Departement in storage.
     *
     * @param CreateDepartementRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartementRequest $request)
    {
        $input = $request->all();

        $departement = $this->departementRepository->create($input);

        Flash::success('Departement enregistré avec succes.');

        return redirect(route('departements.index'));
    }

    /**
     * Display the specified Departement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $departement = $this->departementRepository->find($id);

        if (empty($departement)) {
            Flash::error('Departement not found');

            return redirect(route('departements.index'));
        }

        return view('departements.show')->with('departement', $departement);
    }

    /**
     * Show the form for editing the specified Departement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $departement = $this->departementRepository->find($id);

        if (empty($departement)) {
            Flash::error('Departement not found');

            return redirect(route('departements.index'));
        }

        return view('departements.edit')->with('departement', $departement);
    }

    /**
     * Update the specified Departement in storage.
     *
     * @param int $id
     * @param UpdateDepartementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepartementRequest $request)
    {
        $departement = $this->departementRepository->find($id);

        if (empty($departement)) {
            Flash::error('Departement not found');

            return redirect(route('departements.index'));
        }

        $departement = $this->departementRepository->update($request->all(), $id);

        Flash::success('Departement updated successfully.');

        return redirect(route('departements.index'));
    }

    /**
     * Remove the specified Departement from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $departement = $this->departementRepository->find($id);

        if (empty($departement)) {
            Flash::error('Departement not found');

            return redirect(route('departements.index'));
        }

        $this->departementRepository->delete($id);

        Flash::success('Departement deleted successfully.');

        return redirect(route('departements.index'));
    }
}
