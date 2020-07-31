<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    // public  function GetTeacher(){
    //     $student = User::join('teachers', 'teachers.user_id','=', 'users.id')
    //                 ->first();
    //                 return $student;
    // }

    // public  function GetStudent(){
    //     $student = User::join('admissions', 'admissions.user_id','=', 'users.id')
    //                 ->first();
    //                 return $student;
    // }

    public  function GetUser($role, $id){
        $teacher = User::join('teachers', 'teachers.user_id','=', 'users.id')
                    ->where('users.id',$id)
                    ->first();
      $student = User::join('admissions', 'admissions.user_id','=', 'users.id')
                   ->where('users.id',$id)
                   ->first();

        if ($role == 2){
            
            return $teacher;
        }
       
       return $student;
    }

    // public  function GetActualUser($role, $id){
    //     $teacher = User::join('teachers', 'teachers.user_id','=', 'users.id')
    //                 ->where('users.id',$id)
    //                 ->first();
    //   $student = User::join('admissions', 'admissions.user_id','=', 'users.id')
    //                ->where('users.id',$id)
    //                ->first();

    //     if ($role == 2){
            
    //         return $teacher;
    //     }
       
    //    return $student;
    // }

}
