<?php

namespace App\Repositories;

use App\Models\NoteQuiz;
use App\Repositories\BaseRepository;

/**
 * Class NoteQuizRepository
 * @package App\Repositories
 * @version September 12, 2020, 10:28 am UTC
*/

class NoteQuizRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_student',
        'quiz_id',
        'score'
    ];

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
        return NoteQuiz::class;
    }
}
