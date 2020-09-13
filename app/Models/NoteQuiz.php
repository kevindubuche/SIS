<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NoteQuiz
 * @package App\Models
 * @version September 12, 2020, 10:28 am UTC
 *
 * @property integer $id_student
 * @property integer $quiz_id
 * @property string $score
 */
class NoteQuiz extends Model
{
    use SoftDeletes;

    public $table = 'notequizs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_student',
        'quiz_id',
        'score'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_note_quiz' => 'integer',
        'id_student' => 'integer',
        'quiz_id' => 'integer',
        'score' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_student' => 'required',
        'quiz_id' => 'required',
        'score' => 'required'
    ];

    
}
