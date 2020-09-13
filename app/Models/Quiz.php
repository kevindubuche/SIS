<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quiz
 * @package App\Models
 * @version September 8, 2020, 10:34 pm UTC
 *
 * @property string $titre
 * @property integer $class_id
 * @property integer $teacher_id
 * @property integer $duree
 * @property string $categorie
 */
class Quiz extends Model
{
    use SoftDeletes;

    public $table = 'quizs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

protected $primaryKey = 'quiz_id';

    public $fillable = [
        'titre',
        'class_id',
        'nombre_questions',
        'duree',
        'categorie'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'quiz_id' => 'integer',
        'titre' => 'string',
        'class_id' => 'integer',
        'nombre_questions' => 'integer',
        'duree' => 'integer',
        'categorie' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titre' => 'required',
        'class_id' => 'required',
        'nombre_questions' => 'required',
        'duree' => 'required',
        'categorie' => 'required'
    ];

    public function InfoClass()
    {
        return $this->belongsTo('App\Models\Classes','class_id');
    }
}
