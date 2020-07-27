<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Actus
 * @package App\Models
 * @version July 17, 2020, 5:17 pm UTC
 *
 * @property integer $created_by
 * @property string $title
 * @property string $body
 */
class Actus extends Model
{
    use SoftDeletes;

    public $table = 'actus';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'actu_id';

    public $fillable = [
        'created_by',
        'title',
        'body'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'actu_id' => 'integer',
        'created_by' => 'integer',
        'title' => 'string',
        'body' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_by' => 'required',
        'title' => 'required',
        'body' => 'required'
    ];

    // public function InfoTeacher()
    // {
    //     return $this->belongsTo('App\Models\Teacher','created_by');
    // }

    public  function GetUser($id){

        $user = User::where('users.id',$id)
           ->first();

        $teacher = User::join('teachers', 'teachers.user_id','=', 'users.id')
                    ->where('users.id',$id)
                    ->first();
      $student = User::join('admissions', 'admissions.user_id','=', 'users.id')
                   ->where('users.id',$id)
                   ->first();
    

        if ($user->role == 2){
            
            return $teacher;
        } elseif ($user->role == 1){
            
            return $user;
        }
       
       return $student;
    }


    public function AllComments()
    {
        return $this->hasMany('App\Models\Comments','actu_id');
    }
}
