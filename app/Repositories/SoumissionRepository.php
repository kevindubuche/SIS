<?php

namespace App\Repositories;

use App\Models\Soumission;
use App\Repositories\BaseRepository;

/**
 * Class SoumissionRepository
 * @package App\Repositories
 * @version August 6, 2020, 1:01 am UTC
*/

class SoumissionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'exam_id',
        'description',
        'filename',
        'created_by'
    ];

    protected $primaryKey ="soumission_id";

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
        return Soumission::class;
    }
}
