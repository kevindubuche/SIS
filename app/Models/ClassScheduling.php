<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClassScheduling
 * @package App\Models
 * @version June 16, 2020, 3:54 am UTC
 *
 * @property integer $course_id
 * @property integer $level_id
 * @property integer $shift_id
 * @property integer $classwoom_id
 * @property integer $batch_id
 * @property integer $day_id
 * @property integer $time_id
 * @property integer $teacher_id
 * @property time $start_time
 * @property time $end_time
 * @property boolean $status
 */
class ClassScheduling extends Model
{
    use SoftDeletes;

    public $table = 'class_schedulings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at', 'start_time','end_time'];
    protected $primaryKey= "schedule_id";

    public $fillable = [
        'course_id',
        'level_id',
        'class_id',
        // 'shift_id',
        // 'classwoom_id',
        // 'batch_id',
        // 'day_id',
        // 'time_id',
        // 'teacher_id',
        'semester_id',
        'start_time',
        'end_time',
        'created_by'
        // 'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'schedule_id' => 'integer',
        'course_id' => 'integer',
        'class_id' => 'integer',
        // 'level_id' => 'integer',
        // 'shift_id' => 'integer',
        // 'classwoom_id' => 'integer',
        // 'batch_id' => 'integer',
        'semester_id' =>'integer',
        'day_id' => 'integer',
        'time_id' => 'integer',
        'teacher_id' => 'integer',
        'created_by' => 'integer'
        // 'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'course_id' => 'required',
        'class_id'=>'required',
        // 'level_id' => 'required',
        // 'shift_id' => 'required',
        // 'classwoom_id' => 'required',
        // 'batch_id' => 'required',
        // 'day_id' => 'required',
        // 'time_id' => 'required',
        // 'semester_id'=>'required',
        // 'teacher_id' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'created_by' => 'required',
        // 'status' => 'required'
    ];
    // public static function getCourseInfo(){
    //     $course = ClassScheduling::join('courses', 'courses.course_id','=', 'class_schedulings.course_id')
    //                 ->first();
    //                 return $course;
    // }

    // public  function InfoCourse(){
    //                 return $this->belongsTo('App\Models\Course','course_id');
    // }


    // public  function InfoCourse(){
    //     $course = ClassScheduling::join('courses', 'courses.course_id','=', 'class_schedulings.course_id')
    //     ->first();
                    
    //                 return $course;
    // }
    public function InfoCourse()
    {
        return $this->belongsTo('App\Models\Course','course_id');
    }

    public  function InfoSemester(){
        return $this->belongsTo('App\Models\Semester','semester_id');
     }
     
     public  function InfoClass(){
        return $this->belongsTo('App\Models\Classes','class_id');
     }
    
}
