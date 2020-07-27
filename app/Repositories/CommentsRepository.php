<?php

namespace App\Repositories;

use App\Models\Comments;
use App\Repositories\BaseRepository;

/**
 * Class CommentsRepository
 * @package App\Repositories
 * @version July 17, 2020, 6:49 pm UTC
*/

class CommentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'created_by',
        'actu_id',
        'body'
    ];
    protected $primaryKey ='id_comment';   

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
        return Comments::class;
    }
}
