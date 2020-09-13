<?php

namespace App\Repositories;

use App\Models\Quiz;
use App\Repositories\BaseRepository;

/**
 * Class QuizRepository
 * @package App\Repositories
 * @version September 8, 2020, 10:34 pm UTC
*/

class QuizRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titre',
        'class_id',
        'nombre_questions',
        'duree',
        'categorie'
    ];
    protected $primaryKey = 'quiz_id';
    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Quiz::class;
    }
}
