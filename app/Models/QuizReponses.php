<?php

namespace App\Models;

use Eloquent as Model;

class QuizReponses extends Model
{
    
    protected $fillable = ['id_reponse','id_question','explication'];
    public $timestamps = false;
    public function Question()
    {
        return $this->belongsTo('App\Model\GestionDesCours\quizQuestion');
    }

}
