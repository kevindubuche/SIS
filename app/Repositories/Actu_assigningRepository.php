<?php

namespace App\Repositories;

use App\Models\Actu_assigning;
use App\Repositories\BaseRepository;

/**
 * Class Actu_assigningRepository
 * @package App\Repositories
 * @version August 5, 2020, 9:25 pm UTC
*/

class Actu_assigningRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'actu_id',
        'class_id'
    ];
    protected $primaryKey ='actu_assigning_id';
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
        return Actu_assigning::class;
    }
}
