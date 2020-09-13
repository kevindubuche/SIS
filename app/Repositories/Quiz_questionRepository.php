<?php

namespace App\Repositories;

use App\Models\Quiz_question;
use App\Repositories\BaseRepository;

/**
 * Class Quiz_questionRepository
 * @package App\Repositories
 * @version September 8, 2020, 2:21 am UTC
*/

class Quiz_questionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'content',
        'categorie',
        'class_id'
    ];
    protected $primaryKey = 'id_question';

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
        return Quiz_question::class;
    }
}
