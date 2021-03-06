<?php

namespace App\Http\Requests\V1\Language;

use App\Traits\Requests\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
{
    use FailedValidation;
    
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
        return [
            'language_name' => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'language_name.required' => 'O nome da língua não pode estar em branco!',
            'language_name.string'   => 'O nome da língua precisa ser do tipo texto!',
        ];
    }
}
