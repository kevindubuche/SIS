<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdmissionRequest;
use App\Http\Requests\UpdateAdmissionRequest;
use App\Repositories\AdmissionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Admission;
use App\Models\Roll;
use App\Models\Faculty;
use App\Models\Departement;
use App\Models\Batch;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        $student_id = Admission::max('student_id');
        $roll_id = Roll::max('roll_id');
        $faculties = Faculty::all();
        $departements = Departement::all();
        $batches = Batch::all();
        $allClasses = Classes::all();
        $rand_username_password = mt_rand(111609300011 .$student_id+ 1, 
                             111609300011 .$student_id+ 1);

        return view('admissions.index',
            compact('admissions', 'student_id',
           'faculties','departements',
            'batches', 'roll_id',
        'rand_username_password',
    'allClasses'));
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
        $input = $request->all();
// dd($input); 
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $new_image_name = time().'.'.$extension;
        $file->move(public_path('student_images'), $new_image_name);


        $student = new Admission;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->father_name = $request->father_name;
        $student->father_phone = $request->father_phone;
        $student->mother_name = $request->mother_name;
        $student->mother_phone = $request->mother_phone;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->dob = $request->dob;
        $student->email = $request->email;
        $student->adress = $request->adress;
        $student->departement_id = $request->departement_id;
        $student->faculty_id = $request->faculty_id;
        $student->batch_id = $request->batch_id;
        $student->user_id = $request->user_id;
        $student->class_id = $request->class_id;
        $student->dateregistered = date('Y-m-d');
        $student->image = $new_image_name;


            //ADD HIM AS A USER IN THE DB
            if($student->save()){
                $user = new User;
                $user->name = $request->first_name .' '.$request->last_name;
                $user->role = 3;
                $user->email = $request->email;
                $password = 'qwerty123';//nou ka genere yon ran si nou vle
                $user->password = Hash::make( $password);
    
                $user->save();
    
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

        Flash::success('Admission'.$request->first_name.' '.$request->last_name.' saved successfully.');

        return redirect(route('admissions.index'));
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

        if (empty($admission)) {
            Flash::error('Admission not found');

            return redirect(route('admissions.index'));
        }

        return view('admissions.show')->with('admission', $admission);
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
        $faculties = Faculty::all();
        $departements = Departement::all();
        $batches = Batch::all();
        // $rand_username_password = mt_rand(111609300011 .$student_id+ 1, 
        //                      111609300011 .$student_id+ 1);


        $admission = $this->admissionRepository->find($id);

        if (empty($admission)) {
            Flash::error('Admission not found');

            return redirect(route('admissions.index'));
        }

        return view('admissions.edit',
        compact('faculties', 'departements', 'batches'))
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
    public function update($id, Request $request)
    {
        $input = $request->all();
//   dd($request->batch_id);

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $new_image_name = time().'.'.$extension;
        $file->move(public_path('student_images'), $new_image_name);


        $student = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'father_phone' => $request->father_phone,
            'mother_name' => $request->mother_name,
            'mother_phone' => $request->mother_phone,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'email' => $request->email,
            'adress' => $request->adress,
            'departement_id' => $request->departement_id,
            'faculty_id' => $request->faculty_id,
            'batch_id' => $request->batch_id,
            'user_id' => $request->user_id,
            'dateregistered' => date('Y-m-d'),
            'image' => $new_image_name
        );
       

        // var_dump($student); die;
        // echo "<pre>"; print_r($student); die;
        // $admission = $this->admissionRepository->find($id);

        if (empty($student)) {
            Flash::error($request->first_name. ' '. $request->last_name.'Admission not found');

            return redirect(route('admissions.index'));
        }

        // $admission = $this->admissionRepository->update($request->all(), $id);
        // dd($student['batch_id']);
        Admission::findOrFail($id)->update($student);

        Flash::success($request->first_name. ' '. $request->last_name.'Admission updated successfully.');

        return redirect(route('admissions.index'));
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
            Flash::error('Admission not found');

            return redirect(route('admissions.index'));
        }

        $this->admissionRepository->delete($id);

        Flash::success('Admission deleted successfully.');

        return redirect(route('admissions.index'));
    }
}