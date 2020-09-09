<?php

namespace App\Https\Controllers;

use App\Https\Requests\CreateActu_assigningRequest;
use App\Https\Requests\UpdateActu_assigningRequest;
use App\Repositories\Actu_assigningRepository;
use App\Https\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Actu_assigningController extends AppBaseController
{
    /** @var  Actu_assigningRepository */
    private $actuAssigningRepository;

    public function __construct(Actu_assigningRepository $actuAssigningRepo)
    {
        $this->actuAssigningRepository = $actuAssigningRepo;
    }

    /**
     * Display a listing of the Actu_assigning.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $actuAssignings = $this->actuAssigningRepository->all();

        return view('actu_assignings.index')
            ->with('actuAssignings', $actuAssignings);
    }

    /**
     * Show the form for creating a new Actu_assigning.
     *
     * @return Response
     */
    public function create()
    {
        return view('actu_assignings.create');
    }

    /**
     * Store a newly created Actu_assigning in storage.
     *
     * @param CreateActu_assigningRequest $request
     *
     * @return Response
     */
    public function store(CreateActu_assigningRequest $request)
    {
        $input = $request->all();

        $actuAssigning = $this->actuAssigningRepository->create($input);

        Flash::success('Actu Assigning saved successfully.');

        return redirect(route('actuAssignings.index'));
    }

    /**
     * Display the specified Actu_assigning.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $actuAssigning = $this->actuAssigningRepository->find($id);

        if (empty($actuAssigning)) {
            Flash::error('Actu Assigning not found');

            return redirect(route('actuAssignings.index'));
        }

        return view('actu_assignings.show')->with('actuAssigning', $actuAssigning);
    }

    /**
     * Show the form for editing the specified Actu_assigning.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $actuAssigning = $this->actuAssigningRepository->find($id);

        if (empty($actuAssigning)) {
            Flash::error('Actu Assigning not found');

            return redirect(route('actuAssignings.index'));
        }

        return view('actu_assignings.edit')->with('actuAssigning', $actuAssigning);
    }

    /**
     * Update the specified Actu_assigning in storage.
     *
     * @param int $id
     * @param UpdateActu_assigningRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActu_assigningRequest $request)
    {
        $actuAssigning = $this->actuAssigningRepository->find($id);

        if (empty($actuAssigning)) {
            Flash::error('Actu Assigning not found');

            return redirect(route('actuAssignings.index'));
        }

        $actuAssigning = $this->actuAssigningRepository->update($request->all(), $id);

        Flash::success('Actu Assigning updated successfully.');

        return redirect(route('actuAssignings.index'));
    }

    /**
     * Remove the specified Actu_assigning from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $actuAssigning = $this->actuAssigningRepository->find($id);

        if (empty($actuAssigning)) {
            Flash::error('Actu Assigning not found');

            return redirect(route('actuAssignings.index'));
        }

        $this->actuAssigningRepository->delete($id);

        Flash::success('Actu Assigning deleted successfully.');

        return redirect(route('actuAssignings.index'));
    }
}
