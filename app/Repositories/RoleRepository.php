<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RoleRepository extends Repository
{

    /**
     * Get list of roles
     *
     */
    public function getPaginated(): LengthAwarePaginator|array
    {
        return Role::query()
            ->orderByDesc('created_at')
            ->paginate(self::DEFAULT_LIMIT);
    }
}
