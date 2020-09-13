<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Course
 * @package App\Models
 * @version June 16, 2020, 3:37 am UTC
 *
 * @property string $course_name
 * @property string $course_code
 * @property string $description
 * @property boolean $status
 */
class Course extends Model
{
    use SoftDeletes;

    public $table = 'courses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $primaryKey = 'course_id';


    public $fillable = [
        'course_name',
        'description',
        'created_by',
         'matiere_id',
         'contenu',
         'videoLink',
         'publier'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'course_id' => 'integer',
        'course_name' => 'string',
        'description' => 'string',
        'created_by' => 'integer',
        'matiere_id' => 'integer',
        'contenu' => 'string',
        'publier'=> 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'course_name' => 'required',
        // 'description' => 'required',
        'created_by' => 'required',
         'matiere_id' => 'required',
         'publier'=> 'required'
    ];

    public  function GetUser($id){

        $user = User::where('users.id',$id)
           ->first();
       
       return $user;
    }

    
}
