<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Departement
 * @package App\Models
 * @version June 29, 2020, 4:39 pm UTC
 *
 * @property integer $faculty_id
 * @property string $departement_name
 * @property string $departement_code
 * @property string $departement_description
 * @property boolean $status
 */
class Departement extends Model
{
    use SoftDeletes;

    public $table = 'departements';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        // 'faculty_id',
        'departement_name',
        'departement_code',
        'departement_description'
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'departement_id' => 'integer',
        // 'faculty_id' => 'integer',
        'departement_name' => 'string',
        'departement_code' => 'string',
        'departement_description' => 'string'
      
    ];
    protected $primaryKey ='departement_id';
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'faculty_id' => 'required',
        'departement_name' => 'required',
        'departement_code' => 'required',
        'departement_description' => 'required'
       
    ];

    // public function InfoFaculty()
    // {
    //     return $this->belongsTo('App\Models\Faculty','faculty_id');
    // }
}
