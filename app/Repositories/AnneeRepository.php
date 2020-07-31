<?php

namespace App\Repositories;

use App\Models\Annee;
use App\Repositories\BaseRepository;

/**
 * Class AnneeRepository
 * @package App\Repositories
 * @version July 30, 2020, 8:08 pm UTC
*/

class AnneeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title'
    ];
    protected $primaryKey ='annee_id';
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
        return Annee::class;
    }
}
