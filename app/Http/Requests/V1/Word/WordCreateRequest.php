<?php

namespace App\Http\Requests\V1\Word;

use Illuminate\Foundation\Http\FormRequest;

class WordCreateRequest extends FormRequest
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
        return [
            'word1'             => 'required',
            'word2'             => 'required',
            'word1.description' => 'required',
            'word2.description' => 'required',
            'word1.language_id' => 'required',
            'word2.language_id' => 'required',
            'word1.example'     => 'required',
            'word2.example'     => 'required'
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
            'word1.required'             => 'A palavra 1 não pode estar vazia!',
            'word2.required'             => 'A palavra 2 não pode estar vazia!',
            'word1.description.required' => 'A descrição da palavra 1 não pode estar vazia!',
            'word2.description.required' => 'A descrição da palavra 2 não pode estar vazia!',
            'word1.language_id.required' => 'O id lingua da palavra 1 não pode estar vazia!',
            'word2.language_id.required' => 'O id lingua da palavra 2 não pode estar vazia!',
            'word1.example.required'     => 'O exemplo da palavra 1 não pode estar vazia!',
            'word2.example.required'     => 'O exemplo da palavra 2 não pode estar vazia!'
        ];
    }
}
