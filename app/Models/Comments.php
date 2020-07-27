<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comments
 * @package App\Models
 * @version July 17, 2020, 6:49 pm UTC
 *
 * @property integer $created_by
 * @property string $actu_id
 * @property string $body
 */
class Comments extends Model
{
    use SoftDeletes;

    public $table = 'comments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $primaryKey ='id_comment';    


    public $fillable = [
        'created_by',
        'actu_id',
        'body'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_comment' => 'integer',
        'created_by' => 'integer',
        'actu_id' => 'string',
        'body' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_by' => 'required',
        'actu_id' => 'required',
        'body' => 'required'
    ];

    // public function InfoUser()
    // {   $teacher =$this->hasOne('App\Models\Teacher','user_id','created_by');
    //     $student = $this->hasOne('App\Models\Admission','user_id','created_by');

    //     if($teacher){
    //         return $teacher; 
    //     }
    //     return $student;
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

    
}
