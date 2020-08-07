<?php

namespace App\Repositories;

use App\Models\Admission;
use App\Repositories\BaseRepository;

/**
 * Class AdmissionRepository
 * @package App\Repositories
 * @version June 16, 2020, 3:58 am UTC
*/

class AdmissionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'roll_no',
        'first_name',
        'last_name',
        'father_name',
        'father_phone',
        'mother_name',
        'mother_phone',
        'gender',
        'email',
        'dob',
        'phone',
        'adress',
        'religion',
        'dateRegistered',
        'user_id',
        'class_id',
        'image'
    ];

    protected $primaryKey ='student_id';
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
        return Admission::class;
    }
}
