<?php

namespace App\Models;

use Eloquent as Model;

class quizProposition extends Model
{
    
    protected $fillable = ['id_proposition','id_question'];
    public $timestamps = false;
    public function Question()
    {
        return $this->belongsTo('App\Model\GestionDesCours\quizQuestion');
    }
    

}