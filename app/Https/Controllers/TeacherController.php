<?php

namespace App\Https\Controllers;

use App\Https\Requests\CreateTeacherRequest;
use App\Https\Requests\UpdateTeacherRequest;
use App\Repositories\TeacherRepository;
use App\Https\Controllers\AppBaseController;
use Illuminate\Https\Request;
use Flash;
use Response;

use App\Models\User;
use App\Models\Teacher;
use File;
use Str;
use DB;
use App\Models\ClassScheduling;
use Illuminate\Support\Facades\Hash;
class TeacherController extends AppBaseController
{
    /** @var  TeacherRepository */
    private $teacherRepository;

    public function __construct(TeacherRepository $teacherRepo)
    {
        $this->teacherRepository = $teacherRepo;
    }

    /**
     * Display a listing of the Teacher.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        $teachers = Teacher::orderBy('last_name', 'asc')->get();
        // $teachers = $this->teacherRepository->all();

        return view('teachers.index')
            ->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new Teacher.
     *
     * @return Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created Teacher in storage.
     *
     * @param CreateTeacherRequest $request
     *
     * @return Response
     */
    public function store(CreateTeacherRequest $request)
    {
        try{
            $input = $request->all();

        // $teacher = $this->teacherRepository->create($input);

        //NAP ADD USER A AVAN

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role = 2;
        $user->email = $request->email;
        $password = 'password';//nou ka genere yon ran si nou vle
        $user->password = Hash::make( $password);

        $save =$user->save();
        $user_id =DB::getPdo()->lastInsertId(); 
    //  dd($user_id);
 
        //AND NAP ADD TEACHER A AK ID USER A AS user_id
        if($save){

            //GESTION DE L'IMAGE
            // $profile_picture = $request->image;
            $image = $request->file('image');
            $image_name = "";
            if($image==null){
                $image_name = "defaultAvatar.png";
            }
            else{
                $genarate_name = uniqid()."_".time().date("Ymd")."_IMG";
                $image_name = $genarate_name.'.'.$image->getClientOriginalExtension();
                
            }

            // $image = $request->file('image');
            // $image_name = rand(1111,9999).'.'.$image->getClientOriginalExtension();
            if($image ==null){

            }else{
                $image->move(public_path('user_images'), $image_name);
            }
            
    
            $teacher = new Teacher;
            $teacher->first_name = $request->first_name;
            $teacher->last_name = $request->last_name;
            $teacher->gender = $request->gender;
            $teacher->statusmatrimonial = $request->statusmatrimonial;
            $teacher->email = $request->email;
            $teacher->dob = $request->dob;
            $teacher->phone = $request->phone;
            $teacher->adress = $request->adress;
            $teacher->religion = $request->religion;
            $teacher->nif = $request->nif;
            $teacher->niveau = $request->niveau;
            $teacher->options = $request->options;
            $teacher->dateRegistered = $request->dateRegistered;
            $teacher->user_id = $user_id;
            $teacher->image = $image_name;
            //   dd($teacher->user_id);
            $teacher->save();

        }
        //SEND MAIL WITH PASSWORD TO THE TEACHER

        Flash::success('Professeur enregistré avec succès');

        return redirect(route('teachers.index'));
        }catch(\Illuminate\Database\QueryException $e){
            //if email  exist before in db redirect with error messages
            Flash::error('Email existant');
            return redirect(route('teachers.index'));
           }
        
    }

    /**
     * Display the specified Teacher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $teacher = $this->teacherRepository->find($id);

        $schedules =ClassScheduling::where('created_by', $teacher->user_id)->get();
        // dd($schedules);
        if (empty($teacher)) {
            Flash::error('Professeur non trouvé(e)');

            return redirect(route('teachers.index'));
        }

        return view('teachers.show', compact('schedules'))->with('teacher', $teacher);
    }

    /**
     * Show the form for editing the specified Teacher.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        return view('teachers.edit')->with('teacher', $teacher);
    }

    /**
     * Update the specified Teacher in storage.
     *
     * @param int $id
     * @param UpdateTeacherRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeacherRequest $request)
    {
        try{
            $teacher = $this->teacherRepository->find($id);

            //NAP SAVE USER A AVAN POU SI EMAIL LA TA DUPLIKE POU LI GENTAN EXIT
            $user = array(
              'first_name' => $request->first_name,
              'last_name' => $request->last_name,
              'email' => $request->email        
              
          );
          User::findOrFail($teacher->user_id)->update($user);
          //FIN UPDATE USER
  
          if (empty($teacher)) {
              Flash::error('Professeur non trouvé');
  
              return redirect(route('teachers.index'));
          }
  
          // $teacher = $this->teacherRepository->update($request->all(), $id);
  
          //CHECK IF THE IMAGE HAS CHANGED
          // dd($teacher->user_id);
          if($request->image != $teacher->image){
              //DELETE OLD IMAGE
              if( $teacher->image !='defaultAvatar.png' 
            && $request->image != null ){
                  
              //    dd($request->image);
                    File::delete(public_path().'/user_images/'.$teacher->image);
        
              }
          }
  
          $image = $request->file('image');
          
          if($image ==null){
              $image_name = $teacher->image;
            
          }else{
              $image_name = uniqid()."_".time().date("Ymd")."_IMG".'.'.$image->getClientOriginalExtension();
              $image->move(public_path('user_images'), $image_name);
  
          }
  
          
          //  dd($teacher->user_id);
  
          $teacher->fill($request->except(['token','image']));
          
          $teacher->image= $image_name ;
          $teacher->save();
  
  
  
  
          Flash::success('Professeur modifié avec succès.');
  
          return redirect(route('teachers.index'));
            
        }catch(\Illuminate\Database\QueryException $e){
            //if email  exist before in db redirect with error messages
            Flash::error('Email existant');
            return redirect(route('teachers.index'));
           }
     
    }

    /**
     * Remove the specified Teacher from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Professeur introuvable');

            return redirect(route('teachers.index'));
        }
        //REMOVE THE IMAGE FROM THE teacher_images FOLDER
        if( $teacher->image !='defaultAvatar.png' ){
        File::delete(public_path().'/user_images/'.$teacher->image);
        }
        $this->teacherRepository->forcedelete($id);

        Flash::success('Professeur supprimé avec succes.');

        return redirect(route('teachers.index'));
    }
}
