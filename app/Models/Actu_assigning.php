<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Actu_assigning
 * @package App\Models
 * @version August 5, 2020, 9:25 pm UTC
 *
 * @property integer $actu_id
 * @property integer $class_id
 */
class Actu_assigning extends Model
{
    use SoftDeletes;

    public $table = 'actu_assignings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
protected $primaryKey ='actu_assigning_id';


    public $fillable = [
        'actu_id',
        'class_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'actu_assigning_id' => 'integer',
        'actu_id' => 'integer',
        'class_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'actu_id' => 'required',
        'class_id' => 'required'
    ];

    public function InfoActu()
    {
        return $this->belongsTo('App\Models\Actus','actu_id');
    }

    public function InfoClass()
    {
        return $this->belongsTo('App\Models\Classes','class_id');
    }

    
}
