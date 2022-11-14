<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieStoreRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'movie_persons.*.person' => 'required_unless:movie_persons,array',
            'movie_persons.*.role' => 'required_unless:movie_persons,array',
        ];
    }
}
