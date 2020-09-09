<?php

namespace App\Https\Controllers;

use App\Https\Requests\CreateAdmissionRequest;
use App\Https\Requests\UpdateAdmissionRequest;
use App\Repositories\AdmissionRepository;
use App\Https\Controllers\AppBaseController;
use Illuminate\Https\Request;
use Flash;
use Response;

use App\Models\Admission;
use App\Models\Roll;
use App\Models\Departement;
use App\Models\Classes;
use App\Models\User;
use App\Models\ClassScheduling;
use Illuminate\Support\Facades\Hash;
use DB;

class AdmissionController extends AppBaseController
{
    /** @var  AdmissionRepository */
    private $admissionRepository;

    public function __construct(AdmissionRepository $admissionRepo)
    {
        $this->admissionRepository = $admissionRepo;
    }
 
    /**
     * Display a listing of the Admission.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $admissions = $this->admissionRepository->all();
         $admissions = Admission::all();
        // $student_id = Admission::max('student_id');
        // $roll_id = Roll::max('roll_id');
        // $batches = Batch::all();
        // $faculties = Faculty::all();

        $departements = Departement::all();
       
        $allClasses = Classes::all();
        // $rand_username_password = mt_rand(111609300011 .$student_id+ 1, 
        //                      111609300011 .$student_id+ 1);



        $user = User::find(auth()->user()->id);

        if($user->role == 1 ){
            return view('admissions.index',
            compact('admissions', 'departements', 'allClasses'));
            }
         else  if($user->role == 2 ){
            $admissions = Admission::join('class_assignings','class_assignings.class_id','=','admissions.class_id')//qui sont dans l'horaire de l'etudiant
            ->where('teacher_id',$user->id)
           ->get();
           return view('admissions.index',
           compact('admissions', 'departements', 'allClasses'));
           }
        

    //     return view('admissions.index',
    //         compact(
    //             'admissions',
    //     //          'student_id',
           
    //     //     'batches', 
    //     //     'roll_id',
    //     // 'rand_username_password',
    //     'departements',
    // 'allClasses'));
    }

    /**
     * Show the form for creating a new Admission.
     *
     * @return Response
     */
    public function create()
    {
        return view('admissions.create');
    }

    /**
     * Store a newly created Admission in storage.
     *
     * @param CreateAdmissionRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try{
            $input = $request->all();
// dd($input); 

        $user = new User;
        $user->first_name = $request->first_name ;
        $user->last_name =$request->last_name;
        $user->role = 3;
        $user->email = $request->email;
        $password = 'password';//nou ka genere yon ran si nou vle
        $user->password = Hash::make( $password);

        // $user->save();

        $student = new Admission;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->father_name = $request->father_name;
        $student->father_phone = $request->father_phone;
        $student->mother_name = $request->mother_name;
        $student->mother_phone = $request->mother_phone;
        $student->responsable_nom = $request->responsable_nom;
        $student->responsable_phone = $request->responsable_phone;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->dob = $request->dob;
        $student->email = $request->email;
        $student->adress = $request->adress;
        $student->departement_id = $request->departement_id;
         $student->religion = $request->religion;
        $student->class_id = $request->class_id;
        $student->dateregistered = date('Y-m-d');


        $save =$user->save();
        $user_id =DB::getPdo()->lastInsertId(); 

            //ADD HIM AS A USER IN THE DB
            if($save){
                $image = $request->file('image');
                $image_name = "";
                if($image==null){
                    $image_name = "defaultAvatar.png";
                }
                else{
                    $genarate_name = uniqid()."_".time().date("Ymd")."_IMG";
                    $image_name = $genarate_name.'.'.$image->getClientOriginalExtension();
                    
                }
                if($image ==null){

                }else{
                    $image->move(public_path('user_images'), $image_name);
                }

               
                $student->image = $image_name;

                $student->user_id = $user_id;
                $student->save();
    
            }

            //SEND THE PASSWORD VIA EMAIL

        // if($student->save()){ 
        //     $student_id = $student->student_id;
        //     $username =$student->username;
        //     $password = $student->password;

        //     Roll::insert(['student_id'=> $student_id,
        //         'username'=>$request->username,
        //         'password'=>$request->password]);

        //         // dump($request->all()); die;
        // }
        // $admission = $this->admissionRepository->create($input);

        Flash::success($request->first_name.' '.$request->last_name.' ajouté(e) avec succès.');

        return redirect(route('admissions.index'));
        }catch(\Illuminate\Database\QueryException $e){
            //if email  exist before in db redirect with error messages
            Flash::error('Email existant');
            return redirect(route('admissions.index'));
           }
        
    }

    /**
     * Display the specified Admission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $admission = $this->admissionRepository->find($id);

        $schedules =ClassScheduling::where('class_id', $admission->class_id)->get();
        
        // dd($schedules);
        if (empty($admission)) {
            Flash::error('Etudiant non trouvé');

            return redirect(route('admissions.index'));
        }

        return view('admissions.show',compact('schedules'))->with('admission', $admission);
    }

    /**
     * Show the form for editing the specified Admission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roll_id = Roll::max('roll_id');
        // $faculties = Faculty::all();
        $departements = Departement::all();
        $classes = Classes::all();
       
        // $rand_username_password = mt_rand(111609300011 .$student_id+ 1, 
        //                      111609300011 .$student_id+ 1);


        $admission = $this->admissionRepository->find($id);

        if (empty($admission)) {
            Flash::error('Elève non trouvé(e)');

            return redirect(route('admissions.index'));
        }

        return view('admissions.edit',
        compact( 'departements','classes'))
        ->with('admission', $admission);
    }

    /**
     * Update the specified Admission in storage.
     *
     * @param int $id
     * @param UpdateAdmissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdmissionRequest $request)
    {
        try{
            $admission = $this->admissionRepository->find($id);

            //NAP SAVE USER A AVAN POU SI EMAIL LA TA DUPLIKE POU LI GENTAN EXIT
            $user = array(
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email        
                
            );
            User::findOrFail($admission->user_id)->update($user);
            //FIN UPDATE USER

        if (empty($admission)) {
            Flash::error('Elève non trouvé(e)');

            return redirect(route('admissions.index'));
        }
          //CHECK IF THE IMAGE HAS CHANGED
        // dd($teacher->user_id);
        if($request->image != $admission->image){
            //DELETE OLD IMAGE
            if( $admission->image !='defaultAvatar.png' 
          && $request->image != null ){
                
            //    dd($request->image);
                  File::delete(public_path().'/user_images/'.$admission->image);
      
            }
        }
        $image = $request->file('image');
        
        if($image ==null){
            $image_name = $admission->image;
          
        }else{
            $image_name = uniqid()."_".time().date("Ymd")."_IMG".'.'.$image->getClientOriginalExtension();
            $image->move(public_path('user_images'), $image_name);

        }
        $admission->fill($request->except(['token','image']));
        
        $admission->image= $image_name ;
        $admission->save();
        // $input = $request->all();
//   dd($request->batch_id);

        // $file = $request->file('image');
        // $extension = $file->getClientOriginalExtension();
        // $new_image_name = time().'.'.$extension;
        // $file->move(public_path('user_images'), $new_image_name);


        // $student = array(
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'father_name' => $request->father_name,
        //     'father_phone' => $request->father_phone,
        //     'mother_name' => $request->mother_name,
        //     'mother_phone' => $request->mother_phone,
        //     'responsable_nom' => $request->responsable_nom,
        //     'responsable_phone' => $request->responsable_phone,
        //     'gender' => $request->gender,
        //     'phone' => $request->phone,
        //     'dob' => $request->dob,
        //     'email' => $request->email,
        //     'adress' => $request->adress,
        //     'departement_id' => $request->departement_id,
        //     // 'faculty_id' => $request->faculty_id,
        //      'religion' => $request->religion,
        //     // 'user_id' => $request->user_id,
        //     'dateregistered' => date('Y-m-d'),
        //     'image' => $new_image_name
        // );
    
        // var_dump($student); die;
        // echo "<pre>"; print_r($student); die;
        

        // if (empty($student)) {
        //     Flash::error($request->first_name. ' '. $request->last_name.'Admission not found');

        //     return redirect(route('admissions.index'));
        // }

        // $admission = $this->admissionRepository->update($request->all(), $id);
        // dd($student['batch_id']);
        // Admission::findOrFail($id)->update($student);
       

        Flash::success('Elève modifié(e) avec succès');

        return redirect(route('admissions.index'));

        }catch(\Illuminate\Database\QueryException $e){
             //if email  exist before in db redirect with error messages
             Flash::error('Email existant');
             return redirect(route('admissions.index'));
            }
        
    }

    /**
     * Remove the specified Admission from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $admission = $this->admissionRepository->find($id);

        if (empty($admission)) {
            Flash::error('Etudiant non trouvé(e)');

            return redirect(route('admissions.index'));
        }

        $this->admissionRepository->delete($id);

        Flash::success('Etudiant supprimé(e) avec succès.');

        return redirect(route('admissions.index'));
    }
}
