<?php

namespace App\Repositories;

use App\Models\Transactions;
use App\Repositories\BaseRepository;

/**
 * Class TransactionsRepository
 * @package App\Repositories
 * @version June 16, 2020, 3:56 am UTC
*/

class TransactionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'fee_id',
        'user_id',
        'paid',
        'transaction_date',
        'remark',
        'time_id',
        'description'
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
        return Transactions::class;
    }
}
