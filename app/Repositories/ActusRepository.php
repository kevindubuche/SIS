<?php

namespace App\Repositories;

use App\Models\Actus;
use App\Repositories\BaseRepository;

/**
 * Class ActusRepository
 * @package App\Repositories
 * @version July 17, 2020, 5:17 pm UTC
*/

class ActusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'created_by',
        'title',
        'body'
    ];

    protected $primaryKey = 'actu_id';
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
        return Actus::class;
    }
}
