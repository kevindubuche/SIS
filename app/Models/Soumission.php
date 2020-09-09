<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Soumission
 * @package App\Models
 * @version August 6, 2020, 1:01 am UTC
 *
 * @property integer $course_id
 * @property integer $class_id
 * @property string $description
 * @property string $filename
 * @property integer $created_by
 */
class Soumission extends Model
{
    use SoftDeletes;

    public $table = 'soumissions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
protected $primaryKey ="soumission_id";


    public $fillable = [
        'exam_id',
        'description',
        'filename',
        'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'soumission_id' => 'integer',
        'eam_id' => 'integer',
        'description' => 'string',
        'filename' => 'string',
        'created_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'exam_id' => 'required',
        // 'description' => 'required',
        'filename' => 'required',
        'created_by' => 'required'
    ];

    public function GetExam()
    {
        return $this->belongsTo('App\Models\Exam','exam_id');
    }
    public  function InfoExam(){
        return $this->belongsTo('App\Models\Exam','exam_id');
     }
     



     public  function GetUser($id){
        $user = User::where('users.id',$id)
           ->first();
       
       return $user;
    }

    
}
