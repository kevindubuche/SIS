<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClassAssigning
 * @package App\Models
 * @version June 16, 2020, 3:50 am UTC
 *
 * @property integer $course_id
 * @property integer $level_id
 * @property integer $shift_id
 * @property integer $classwoom_id
 * @property integer $batch_id
 * @property integer $day_id
 * @property integer $time_id
 */
class ClassAssigning extends Model
{
    use SoftDeletes;

    public $table = 'class_assignings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $primaryKey ='class_assign_id';


    public $fillable = [
        // 'course_id',
        // 'level_id',
        // 'shift_id',
        // 'classwoom_id',
        // 'batch_id',
        // 'day_id',
        // 'time_id'
        'teacher_id',
        'class_id',
        'semester_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'class_assign_id' => 'integer',
        // 'course_id' => 'integer',
        // 'level_id' => 'integer',
        // 'shift_id' => 'integer',
        // 'classwoom_id' => 'integer',
        // 'batch_id' => 'integer',
        // 'day_id' => 'integer',
        // 'time_id' => 'integer'
        'class_assign_id' => 'integer',
        'teacher_id' => 'integer',
        'class_id' => 'integer',
        'semester_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'course_id' => 'required',
        // 'level_id' => 'required',
        // 'shift_id' => 'required',
        // 'classwoom_id' => 'required',
        // 'batch_id' => 'required',
        // 'day_id' => 'required',
        // 'time_id' => 'required'
        'teacher_id' => 'required',
        'semester_id'=>'required',
        'class_id' => 'required',
    ];

    // public function InfoTeacher()
    // {
    //     return $this->belongsTo('App\Models\Teacher','user_id');
    // }

    public  function InfoTeacher( $id){
        $user = User::where('users.id',$id)
                    ->first();
       
       return $user;
    }
    public  function InfoClass(){
        return $this->belongsTo('App\Models\Classes','class_id');
     }
     
 
    
}
