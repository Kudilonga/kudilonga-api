<?php

namespace App\Traits\Requests;

use Illuminate\{
    Contracts\Validation\Validator,
    Http\Exceptions\HttpResponseException
};

trait FailedValidation
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}