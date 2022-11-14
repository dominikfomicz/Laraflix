<?php

namespace App\Http\Resources\Role;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleCollectionResource extends JsonResource
{
    public function __construct(private Role $role)
    {
        parent::__construct($role);
    }

    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => data_get($this, 'id'),
            'name' => data_get($this, 'name'),
            'created_at' => data_get($this, 'created_at') ?
                data_get($this, 'created_at')->format('Y-m-d H:i') : '',
            'actions' => [
                'edit' => route('roles.edit', ['role' => data_get($this, 'id')]),
                'destroy' => route('roles.destroy', ['role' => data_get($this, 'id')])
            ]
        ];
    }
}
