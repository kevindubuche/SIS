<?php

namespace App\Https\Controllers;

use App\Https\Requests\CreateActusRequest;
use App\Https\Requests\UpdateActusRequest;
use App\Repositories\ActusRepository;
use App\Https\Controllers\AppBaseController;
use Illuminate\Https\Request;
use Flash;
use Response;

use App\Models\Classes;
use App\Models\Actu_assigning;
use DB;
use App\Models\Actus;
use App\Models\User;
use App\Models\Admission;
use App\Models\Teacher;

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
        /// #######  start usefull function
            function IsAdm($id){
                $SearchUser = User::find($id);
                if($SearchUser){
                    if($SearchUser->role == 1){
                        return true;
                    }
                }
                return false;
            }
       /// #######  end usefull function

        $actuses = $this->actusRepository->all();

        $user = User::find(auth()->user()->id);
              //ADM SEE ALL ACTU
              if($user->role == 1 ){
                return view('actuses.index')
                ->with('actuses', $actuses);
            }
         //teachers SEE only MESAJ YO KREYE AK MESAj ADM KREYE
         else  if($user->role == 2 ){
           
            // dd('role 2');
            $actuAdm = collect();
            foreach($actuses as $actu){
                if(IsAdm($actu->created_by)){
                    $actuAdm->push($actu);
                }
            }
         
            
            $actuTeacher = Actus::where(['created_by'=> $user->id])->get();
            $actuses = $actuAdm->merge($actuTeacher);
            return view('actuses.index')
            ->with('actuses', $actuses);
        }

        //ELEVE we si actu a assigner a classe li
        else  {
            // dd('role default');
            $student = Admission::where(['user_id'=> $user->id])->first();
            //  dd($student->first_name);
            $actuTeacher = Actus::join('actu_assignings','actu_assignings.actu_id','=','actus.actu_id')//qui sont dans l'horaire de l'etudiant
            ->where('class_id',$student->class_id)
            ->select('actus.*')
            ->get();

        //    $actuAdm = collect();
        //    foreach($actuses as $actu){
        //        if(IsAdm($actu->created_by)){
        //            $actuAdm->push($actu);
        //        }
        //    }

        //    $actuses = $actuAdm->merge($actuTeacher);

   
        return view('actuses.index')
            ->with('actuses', $actuTeacher);
        }
    }

    /**
     * Show the form for creating a new Actus.
     *
     * @return Response
     */
    public function create()
    {
        if(auth()->user()->role == 2){
        $classes = Classes::join('class_assignings','class_assignings.class_id','=','classes.class_id')//qui sont dans l'horaire de l'etudiant
        ->where('class_assignings.teacher_id',auth()->user()->id)->get();
        // $classes = Classes::all();
        return view('actuses.create', compact('classes')); 
        }
        return redirect()->back();
      
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

        if( ! $request->multiclass){
            Flash::error('Classe incorecte');
           
            return redirect()->back();
        }

        $actus = $this->actusRepository->create($input);
        $actu_id =DB::getPdo()->lastInsertId(); 

        foreach($request->multiclass as $key => $teach){
            $data2 = array('actu_id'=> $actu_id,
            'class_id'=> $request->multiclass[$key]);

        $checkExist = Actu_assigning::where('actu_id', $actu_id)
                        ->where('class_id', $request->multiclass[$key])
                        ->first();

        if($checkExist){
            Flash::error('Une ou plusieurs assignations existaient deja pour cette classe.');
            return redirect()->back();
        }
        Actu_assigning::insert($data2);
    }

        // $actus = $this->actusRepository->create($input);

        // assignation aclasse

        Flash::success('Publication faite avec succes.');

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
            Flash::error('Publication non trouvee');

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
    {    if(auth()->user()->role == 2){
        $actus = $this->actusRepository->find($id);
    
            $classes = Classes::join('class_assignings','class_assignings.class_id','=','classes.class_id')//qui sont dans l'horaire de l'etudiant
            ->where('class_assignings.teacher_id',auth()->user()->id)->get();
        // $classes = Classes::all();

        if (empty($actus)) {
            Flash::error('Actus not found');

            return redirect(route('actuses.index'));
        }

        return view('actuses.edit',compact('classes'))->with('actus', $actus);
    }
    return redirect()->back();
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

        $input = $request->all();

        if( ! $request->multiclass){
            Flash::error('Classe incorecte');
            return redirect()->back();
        }


        $actus = $this->actusRepository->find($id);

        if (empty($actus)) {
            Flash::error('Publication non trouvé');

            return redirect(route('actuses.index'));
        }

        $actus = $this->actusRepository->update($request->all(), $id);

        //ann delete actuassigning ki gen rapport avel
        $oldActuAss = Actu_assigning::where('actu_id', $id)
                        ->get();
        foreach($oldActuAss as $ac){
            $ac->forceDelete();
        }

        
        foreach($request->multiclass as $key => $teach){
            $data2 = array('actu_id'=> $id,
            'class_id'=> $request->multiclass[$key]);

        $checkExist = Actu_assigning::where('actu_id', $id)
                        ->where('class_id', $request->multiclass[$key])
                        ->first();
        Actu_assigning::insert($data2);
    }

    Flash::success('Publication modifiée avec succes.');

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
