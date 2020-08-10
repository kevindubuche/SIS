<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Teacher
 * @package App\Models
 * @version June 16, 2020, 3:58 am UTC
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $email
 * @property string $dob
 * @property string $phone
 * @property string $adress
 * @property boolean $status
 * @property string $dateRegistered
 * @property integer $user_id
 * @property string $image
 */
class Teacher extends Model
{
    use SoftDeletes;

    public $table = 'teachers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = "teacher_id";
    public $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'dob',
        'phone',
        'adress',
        'dateRegistered',
        'user_id',
        'religion',
        'options',
        'nif',
        'niveau',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'teacher_id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'gender' => 'string',
        'email' => 'string',
        'dob' => 'date',
        'phone' => 'string',
        'adress' => 'string',
        'dateRegistered' => 'date',
        'user_id' => 'integer',
        'religion' => 'string',
        'options' => 'string',
        'nif' => 'string',
        'niveau' => 'string',
        'image' => 'string',
        'statusmatrimonial' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
        'email' => 'required',
        'dob' => 'required',
        'phone' => 'required',
        'adress' => 'required',
        // 'status' => 'required',
        // 'dateRegistered' => 'required',
        'user_id' => 'required',
        'statusmatrimonial' => 'required'
    ];

    // public function classAssigning()
    // {
    //     return $this->belongsTo('App\Models\ClassAssigning','teacher_id');
    // }
}
