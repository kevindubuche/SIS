<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActusRequest;
use App\Http\Requests\UpdateActusRequest;
use App\Repositories\ActusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ActusController extends AppBaseController
{
    /** @var  ActusRepository */
    private $actusRepository;

    public function __construct(ActusRepository $actusRepo)
    {
        $this->actusRepository = $actusRepo;
    }

    /**
     * Display a listing of the Actus.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $actuses = $this->actusRepository->all();

        return view('actuses.index')
            ->with('actuses', $actuses);
    }

    /**
     * Show the form for creating a new Actus.
     *
     * @return Response
     */
    public function create()
    {
        return view('actuses.create');
    }

    /**
     * Store a newly created Actus in storage.
     *
     * @param CreateActusRequest $request
     *
     * @return Response
     */
    public function store(CreateActusRequest $request)
    {
        $input = $request->all();

        $actus = $this->actusRepository->create($input);

        Flash::success('Actualite plublie avec succes.');

        return redirect(route('actuses.index'));
    }

    /**
     * Display the specified Actus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $actus = $this->actusRepository->find($id);

        if (empty($actus)) {
            Flash::error('Actus not found');

            return redirect(route('actuses.index'));
        }

        return view('actuses.show')->with('actus', $actus);
    }

    /**
     * Show the form for editing the specified Actus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $actus = $this->actusRepository->find($id);

        if (empty($actus)) {
            Flash::error('Actus not found');

            return redirect(route('actuses.index'));
        }

        return view('actuses.edit')->with('actus', $actus);
    }

    /**
     * Update the specified Actus in storage.
     *
     * @param int $id
     * @param UpdateActusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActusRequest $request)
    {
        $actus = $this->actusRepository->find($id);

        if (empty($actus)) {
            Flash::error('Actus not found');

            return redirect(route('actuses.index'));
        }

        $actus = $this->actusRepository->update($request->all(), $id);

        Flash::success('Actus updated successfully.');

        return redirect(route('actuses.index'));
    }

    /**
     * Remove the specified Actus from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $actus = $this->actusRepository->find($id);

        if (empty($actus)) {
            Flash::error('Actus not found');

            return redirect(route('actuses.index'));
        }

        $this->actusRepository->delete($id);

        Flash::success('Actus deleted successfully.');

        return redirect(route('actuses.index'));
    }
}
