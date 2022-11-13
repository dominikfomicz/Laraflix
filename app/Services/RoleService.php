<?php

namespace App\Services;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;

class RoleService
{
    /**
     * @param  RoleStoreRequest  $request
     * @return Role
     */
    public function createRole(RoleStoreRequest $request): Role
    {
        return Role::create([
            'name' => data_get($request, 'name'),
            'is_actor' => data_get($request, 'is_actor'),
            'is_producer' => data_get($request, 'is_producer'),
            'is_director' => data_get($request, 'is_director'),
        ]);
    }

    /**
     * @param  RoleUpdateRequest  $request
     * @param  Role  $role
     * @return bool
     */
    public function updateRole(RoleUpdateRequest $request, Role $role): bool
    {
        return $role->update([
            'name' => data_get($request, 'name'),
            'is_actor' => data_get($request, 'is_actor'),
            'is_producer' => data_get($request, 'is_producer'),
            'is_director' => data_get($request, 'is_director'),
        ]);
    }
}
