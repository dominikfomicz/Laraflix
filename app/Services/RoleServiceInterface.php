<?php

namespace App\Services;

use App\Http\Requests\Role\RoleStoreRequest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Models\Role;

interface RoleServiceInterface
{
    /**
     * @param  RoleStoreRequest  $request
     * @return Role
     */
    public function createRole(RoleStoreRequest $request): Role;

    /**
     * @param  RoleUpdateRequest  $request
     * @param  Role  $role
     * @return bool
     */
    public function updateRole(RoleUpdateRequest $request, Role $role): bool;
}
