<?php

namespace App\Repositories;

use App\Models\ClassScheduling;
use App\Repositories\BaseRepository;

/**
 * Class ClassSchedulingRepository
 * @package App\Repositories
 * @version June 16, 2020, 3:54 am UTC
*/

class ClassSchedulingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'course_id',
        // 'level_id',
        // 'shift_id',
        // 'classwoom_id',
        // 'batch_id',
        // 'day_id',
        // 'time_id',
        // 'teacher_id',
        'start_time',
        'end_time',
        'created_by'
        // 'status'
    ];
    protected $dates = ['start_time','end_time'];
    protected $primaryKey= "schedule_id";
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
        return ClassScheduling::class;
    }
}
