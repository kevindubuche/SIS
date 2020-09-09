<?php

namespace App\Https\Requests;

use Illuminate\Foundation\Https\FormRequest;
use App\Models\Status;

class UpdateStatusRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Status::$rules;
        
        return $rules;
    }
}
