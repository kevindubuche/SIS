<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;
use App\Models\Admission;
use App\Models\ClassScheduling;



class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
         $users = $this->userRepository->all();
        // $users = User::where('role','1')->get();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        try{
        $input = $request->all();
        // dd($input);
        $password = Hash::make( $input['password']);
        $input['password'] = $password;
        //  dd($input);
        $user = $this->userRepository->create($input);

        Flash::success('Utilisateur ajouté avec succès.');

        return redirect(route('users.index'));
    }catch(\Illuminate\Database\QueryException $e){
        //if email  exist before in db redirect with error messages
        Flash::error('Email existant');
        return redirect(route('users.index'));
       }
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

      
        if (empty($user)) {
            Flash::error('Utilisateur non trouvé');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Utilisateur non trouvé');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);

    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        try{
        $input = $request->all();
        // $user = $this->userRepository->find($id);

     
        // $newUser = $request;
        // if (empty($user)) {
        //     Flash::error('Utilisateur non trouve');

        //     return redirect(route('users.index'));
        // }
        
        $newPassword =Hash::make( $request->password);
        
         //dd( $request->all() );
        //  dd($request->all());

        $user = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => $newPassword
            
        );
        if (empty($user)) {
            Flash::error($request->first_name. ' '. $request->last_name.'Utilisateur non trouvé');

            return redirect(route('users.index'));
        }

    //     $user = $this->userRepository->update([$request->all(),'password'=>$newPassword], $id);
    //    dd($user);
    User::findOrFail($id)->update($user);

        Flash::success('Utilisateur modifié avec succès.');

        return redirect(route('users.index'));
    }catch(\Illuminate\Database\QueryException $e){
        //if email  exist before in db redirect with error messages
        Flash::error('Email existant');
        return redirect(route('users.index'));
       }
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Utilisateur non trouvé');

            return redirect(route('users.index'));
        }

        $user->forcedelete($id);

        Flash::success('Utilisateur supprimé avec succès.');

        return redirect(route('users.index'));
    }

    public function profile($id){

       if($id != auth()->user()->id  ){
           return redirect()->back();
       }
        // dd($schedules);
        //CHECK IF IT IS A TEACHER , A STUDENT OR AN ADMIN
        $testUser = User::where(['id'=> $id])->first(); 
         //IF ADMIN
         if($testUser->role == 1){
            $user = User::where('id', $id)->first();
        // dd($student);
        return view('users.profile', compact('user'));
        }
        //IF TEACHER
        if($testUser->role == 2){
            $user = Teacher::where('user_id', $id)->first();
        // dd($student);
        return view('users.profile', compact('user'));
        }
           //IF STUDENT
        elseif($testUser->role == 3){
            $user = Admission::where('user_id', $id)->first();
        return view('users.profile', compact('user'));
        }
        

    }

    public function userUpdatePassword(Request $request){
        $newData = $request->all();
        
        //nap teste si ancien password la bon
        $user = User::where(['id'=> $newData['user_id'] ])->first(); 
        // dd($user->password);
        if ( Hash::check($newData['old_password'], $user->password) ){
            // valid password and send msg update password
            
            $new_password = Hash::make( $newData['new_password']);//this is the new password
            User::where('id', $newData['user_id'])
            ->update(['password'=>$new_password]);
          
            Flash::success('Votre mot de passe a ete moidifie avec success');
            return redirect()->back();
  
        }else{
            // send invalid msg or email not found
            Flash::error('Echec de la modification du mot de passe');
            return redirect()->back();
        }

    }
}
