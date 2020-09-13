<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quiz_question
 * @package App\Models
 * @version September 8, 2020, 2:21 am UTC
 *
 * @property string $content
 * @property string $categorie
 */
class Quiz_question extends Model
{
    use SoftDeletes;

    public $table = 'quiz_questions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id_question';



    public $fillable = [
        'content',
        'categorie',
        'class_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_question' => 'integer',
        'content' => 'string',
        'categorie' => 'string',
        'class_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'content' => 'required',
        'categorie' => 'required',
        'class_id' => 'required'
    ];

    
}
