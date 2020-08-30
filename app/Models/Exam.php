<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Exam
 * @package App\Models
 * @version July 22, 2020, 10:09 pm UTC
 *
 * @property integer $course_id
 * @property integer $class_id
 * @property string $title
 * @property string $description
 * @property string $filename
 * @property integer $created_by
 */
class Exam extends Model
{
    use SoftDeletes;

    public $table = 'exams';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $primaryKey='exam_id';


    public $fillable = [
        'matiere_id',
        'title',
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
        'matiere_id' => 'integer',
        'class_id' => 'integer',
        'title' => 'string',
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
        'matiere_id' => 'required',
        'title' => 'required',
        'description' => 'required',
        'filename' => 'required',
        'created_by' => 'required'
    ];

    public function InfoMatiere()
    {
        return $this->belongsTo('App\Models\Matiere','matiere_id');
    }


    public function InfoCourse()
    {
        return $this->belongsTo('App\Models\Course','course_id');
    }

    public function InfoClass()
    {
        return $this->belongsTo('App\Models\Classes','class_id');
    }

    public function GetClass($examID){
        return Classes::join('matieres','matieres.class_id','=','classes.class_id')//qui sont dans l'horaire de l'etudiant
        ->join('exams','exams.matiere_id','=','matieres.matiere_id')
        ->where('exams.exam_id',$examID)->first();
 
      
    }

    
    public  function GetUser($id){

        $user = User::where('users.id',$id)
           ->first();
       
       return $user;
    }

    public  function GetConnectedStudent($id){

        $user = Admission::where('admissions.user_id',$id)
           ->first();
       
       return $user;
    }


    

}
