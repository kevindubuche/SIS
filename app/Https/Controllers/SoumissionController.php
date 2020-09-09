<?php

namespace App\Https\Controllers;

use App\Https\Requests\CreateSoumissionRequest;
use App\Https\Requests\UpdateSoumissionRequest;
use App\Repositories\SoumissionRepository;
use App\Https\Controllers\AppBaseController;
use Illuminate\Https\Request;
use Flash;
use Response;
use App\Models\Exam;
use App\Models\Soumission;

class SoumissionController extends AppBaseController
{
    /** @var  SoumissionRepository */
    private $soumissionRepository;

    public function __construct(SoumissionRepository $soumissionRepo)
    {
        $this->soumissionRepository = $soumissionRepo;
    }

    /**
     * Display a listing of the Soumission.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $soumissions = $this->soumissionRepository->all();
        $exams = Exam::all();

        return view('soumissions.index', compact('exams'))
            ->with('soumissions', $soumissions);
    }

    /**
     * Show the form for creating a new Soumission.
     *
     * @return Response
     */
    public function create()
    {
        return view('soumissions.create');
    }

    /**
     * Store a newly created Soumission in storage.
     *
     * @param CreateSoumissionRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

          //GESTION DU FICHIER
          $file = $request->file('filename');
          $extension = $file->getClientOriginalExtension();
          $filename = time().'.'.$extension;
          $fullPath = $filename;
  
          $request->file('filename')->move(
              base_path() . '/public/soumission_files/', $filename
          );
   
          
        $soumission = new Soumission;
        $soumission->exam_id = $request->exam_id;
        $soumission->description = $request->description;
        $soumission->created_by = $request->created_by;
        $soumission->filename = $fullPath;
//  dd($input);
        $soumission->save();

        // $soumission = $this->soumissionRepository->create($input);

        Flash::success('Opération effectuée  avec succès.');

        return redirect(route('soumissions.index'));
    }

    /**
     * Display the specified Soumission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $soumission = $this->soumissionRepository->find($id);

        if (empty($soumission)) {
            Flash::error('Soumission not found');

            return redirect(route('soumissions.index'));
        }

        return view('soumissions.show')->with('soumission', $soumission);
    }

    /**
     * Show the form for editing the specified Soumission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $soumission = $this->soumissionRepository->find($id);

        if (empty($soumission)) {
            Flash::error('Soumission not found');

            return redirect(route('soumissions.index'));
        }

        return view('soumissions.edit')->with('soumission', $soumission);
    }

    /**
     * Update the specified Soumission in storage.
     *
     * @param int $id
     * @param UpdateSoumissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoumissionRequest $request)
    {
        $soumission = $this->soumissionRepository->find($id);

        if (empty($soumission)) {
            Flash::error('Soumission not found');

            return redirect(route('soumissions.index'));
        }

        $soumission = $this->soumissionRepository->update($request->all(), $id);

        Flash::success('Soumission updated successfully.');

        return redirect(route('soumissions.index'));
    }

    /**
     * Remove the specified Soumission from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $soumission = $this->soumissionRepository->find($id);

        if (empty($soumission)) {
            Flash::error('Soumission not found');

            return redirect(route('soumissions.index'));
        }

        $this->soumissionRepository->delete($id);

        Flash::success('Soumission deleted successfully.');

        return redirect(route('soumissions.index'));
    }
}
