<?php

namespace App\Https\Requests;

use Illuminate\Foundation\Https\FormRequest;
use App\Models\Annee;

class CreateAnneeRequest extends FormRequest
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
        return Annee::$rules;
    }
}
