<?php

namespace App\Https\Controllers;

use App\Https\Requests\CreateAnneeRequest;
use App\Https\Requests\UpdateAnneeRequest;
use App\Repositories\AnneeRepository;
use App\Https\Controllers\AppBaseController;
use Illuminate\Https\Request;
use Flash;
use Response;

class AnneeController extends AppBaseController
{
    /** @var  AnneeRepository */
    private $anneeRepository;

    public function __construct(AnneeRepository $anneeRepo)
    {
        $this->anneeRepository = $anneeRepo;
    }

    /**
     * Display a listing of the Annee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $annees = $this->anneeRepository->all();

        return view('annees.index')
            ->with('annees', $annees);
    }

    /**
     * Show the form for creating a new Annee.
     *
     * @return Response
     */
    public function create()
    {
        return view('annees.create');
    }

    /**
     * Store a newly created Annee in storage.
     *
     * @param CreateAnneeRequest $request
     *
     * @return Response
     */
    public function store(CreateAnneeRequest $request)
    {
        $input = $request->all();

        $annee = $this->anneeRepository->create($input);

        Flash::success('Année enregistrée avec succès.');

        return redirect(route('annees.index'));
    }

    /**
     * Display the specified Annee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $annee = $this->anneeRepository->find($id);

        if (empty($annee)) {
            Flash::error('Année introuvable');

            return redirect(route('annees.index'));
        }

        return view('annees.show')->with('annee', $annee);
    }

    /**
     * Show the form for editing the specified Annee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $annee = $this->anneeRepository->find($id);

        if (empty($annee)) {
            Flash::error('Année introuvable');

            return redirect(route('annees.index'));
        }

        return view('annees.edit')->with('annee', $annee);
    }

    /**
     * Update the specified Annee in storage.
     *
     * @param int $id
     * @param UpdateAnneeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnneeRequest $request)
    {
        $annee = $this->anneeRepository->find($id);

        if (empty($annee)) {
            Flash::error('Année introuvable');

            return redirect(route('annees.index'));
        }

        $annee = $this->anneeRepository->update($request->all(), $id);

        Flash::success('Année modifiée avec succès.');

        return redirect(route('annees.index'));
    }

    /**
     * Remove the specified Annee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $annee = $this->anneeRepository->find($id);

        if (empty($annee)) {
            Flash::error('Année introuvable');

            return redirect(route('annees.index'));
        }

        $this->anneeRepository->delete($id);

        Flash::success('Année supprimée succès.');

        return redirect(route('annees.index'));
    }
}
