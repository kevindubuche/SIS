<?php

namespace App\Repositories;

use App\Models\Matiere;
use App\Repositories\BaseRepository;

/**
 * Class MatiereRepository
 * @package App\Repositories
 * @version August 17, 2020, 11:36 am UTC
*/

class MatiereRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'class_id',
        'teacher_id',
        'titre'
    ];
    protected $primaryKey = 'matiere_id';

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
        return Matiere::class;
    }
}
