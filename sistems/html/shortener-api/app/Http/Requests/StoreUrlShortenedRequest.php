<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Rules\UrlShortenedNotExpired;

class StoreUrlShortenedRequest extends FormRequest
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
    public function rules(UrlShortenedNotExpired $urlShortenedNotExpired)
    {
        return [
            'url_original' => [
                'required',
                'string'
            ],
            'url_shortened' => [
                'string',
                $urlShortenedNotExpired
            ],
            'date_expiration' => [
                'date',
                'date_format:Y-m-d'
            ],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
