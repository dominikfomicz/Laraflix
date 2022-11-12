<?php

namespace App\Repositories;

use App\Models\Person;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PersonRepository extends Repository
{

    /**
     * Get list of persons
     *
     */
    public function getPaginated(): LengthAwarePaginator|array
    {
        return Person::query()
            ->orderByDesc('created_at')
            ->paginate(self::DEFAULT_LIMIT);
    }
}
