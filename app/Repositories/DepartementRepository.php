<?php

namespace App\Repositories;

use App\Models\Departement;
use App\Repositories\BaseRepository;

/**
 * Class DepartementRepository
 * @package App\Repositories
 * @version June 29, 2020, 4:39 pm UTC
*/

class DepartementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        // 'faculty_id',
        'departement_name',
        'departement_code',
        'departement_description'
        
    ];

    protected $primaryKey ='departement_id';

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
        return Departement::class;
    }
}
