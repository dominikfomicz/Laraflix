<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'is_actor' => 'nullable|boolean',
            'is_producer' => 'nullable|boolean',
            'is_director' => 'nullable|boolean',
        ];
    }
}
