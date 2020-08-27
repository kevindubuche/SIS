<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Matiere
 * @package App\Models
 * @version August 17, 2020, 11:36 am UTC
 *
 * @property integer $class_id
 * @property integer $teacher_id
 */
class Matiere extends Model
{
    use SoftDeletes;

    public $table = 'matieres';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $primaryKey = 'matiere_id';



    public $fillable = [
        'class_id',
        'teacher_id',
        'titre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'matiere_id' => 'integer',
        'class_id' => 'integer',
        'teacher_id' => 'integer',
        'titre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'class_id' => 'required',
        'teacher_id' => 'required',
        'titre' => 'required'
    ];

    
}
