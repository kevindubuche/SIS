<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Admission
 * @package App\Models
 * @version June 16, 2020, 3:58 am UTC
 *
 * @property string $roll_no
 * @property string $first_name
 * @property string $last_name
 * @property string $father_name
 * @property string $father_phone
 * @property string $mother_name
 * @property string $mother_phone
 * @property string $gender
 * @property string $email
 * @property string $dob
 * @property string $phone
 * @property string $adress
 * @property boolean $status
 * @property string $dateRegistered
 * @property integer $user_id
 * @property integer $class_id
 * @property string $image
 */
class Admission extends Model
{
    use SoftDeletes;

    public $table = 'admissions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey ='student_id';


    public $fillable = [
        'roll_no',
        'first_name',
        'last_name',
        'father_name',
        'father_phone',
        'mother_name',
        'mother_phone',
        'gender',
        'email',
        'dob',
        'phone',
        'adress',
        'religion',
        'dateRegistered',
        'user_id',
        'class_id',
        'image',
        'responsable_nom',
        'responsable_phone'
    ];
    

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'student_id' => 'integer',
        'roll_no' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'father_name' => 'string',
        'father_phone' => 'string',
        'mother_name' => 'string',
        'mother_phone' => 'string',
        'gender' => 'string',
        'email' => 'string',
        'dob' => 'date',
        'phone' => 'string',
        'adress' => 'string',
        'religion' => 'string',
        'dateRegistered' => 'date',
        'user_id' => 'integer',
        'class_id' => 'integer',
        'image' => 'string',
        'responsable_nom' => 'string',
        'responsable_phone'=> 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'roll_no' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        // 'father_name' => 'required',
        // 'father_phone' => 'required',
        'mother_name' => 'required',
        // 'mother_phone' => 'required',
        'gender' => 'required',
        'email' => 'required',
        'dob' => 'required',
        'phone' => 'required',
        'adress' => 'required',
        // 'dateRegistered' => 'required',
        'user_id' => 'required',
        'class_id' => 'required'
    ];

    

    // public function InfoFaculty()
    // {
    //     return $this->belongsTo('App\Models\Faculty','faculty_id');
    // }
    // public function InfoDepartement()
    // {
    //     return $this->belongsTo('App\Models\Departement','departement_id');
    // }
    public function InfoClass()
    {
        return $this->belongsTo('App\Models\Classes','class_id');
    }
}
