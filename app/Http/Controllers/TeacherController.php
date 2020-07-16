<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Repositories\TeacherRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\User;
use App\Models\Teacher;
use File;
use Str;
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
        $teachers = $this->teacherRepository->all();

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
        $input = $request->all();

        // $teacher = $this->teacherRepository->create($input);

        $image = $request->file('image');
        $image_name = rand(1111,9999).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('teacher_images'), $image_name);

        $teacher = new Teacher;
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->gender = $request->gender;
        $teacher->email = $request->email;
        $teacher->dob = $request->dob;
        $teacher->phone = $request->phone;
        $teacher->adress = $request->adress;
        $teacher->status = $request->status;
        $teacher->dateRegistered = $request->dateRegistered;
        $teacher->user_id = $request->user_id;
        $teacher->image = $image_name;
        // dd($teacher);
        $teacher->save();
 
        //ADD HIM AS A USER IN THE DB
        if($teacher->save()){
            $user = new User;
            $user->name = $request->first_name .' '.$request->last_name;
            $user->role = 2;
            $user->email = $request->email;
            $password = 'qwerty123';//nou ka genere yon ran si nou vle
            $user->password = Hash::make( $password);

            $user->save();

        }

        //SEND MAIL WITH PASSWORD TO THE TEACHER

        Flash::success('Teacher saved successfully.');

        return redirect(route('teachers.index'));
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

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        return view('teachers.show')->with('teacher', $teacher);
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
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }

        // $teacher = $this->teacherRepository->update($request->all(), $id);

        //CHECK IF THE IMAGE HAS CHANGED
        if($request->image != $teacher->image){
            //DELETE OLD IMAGE
             File::delete(public_path().'/teacher_images/'.$teacher->image);
        }

        

        $image = $request->file('image');
        $image_name = rand(1111,9999).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('teacher_images'), $image_name);


        $teacher->fill($request->except(['token','image']));
        
        $teacher->image= ($request->image == $teacher->image) ? $request->image  : $image_name ;
        $teacher->save();


        Flash::success('Teacher updated successfully.');

        return redirect(route('teachers.index'));
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
            Flash::error('Teacher not found');

            return redirect(route('teachers.index'));
        }
        //REMOVE THE IMAGE FROM THE teacher_images FOLDER
        File::delete(public_path().'/teacher_images/'.$teacher->image);
        
        $this->teacherRepository->delete($id);

        Flash::success('Teacher deleted successfully.');

        return redirect(route('teachers.index'));
    }
}
