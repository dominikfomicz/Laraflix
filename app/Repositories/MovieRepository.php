<?php

namespace App\Repositories;


use App\Models\Movie;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MovieRepository extends Repository
{

	/**
	 * Get list of movies for current user
	 *
	 */
	public function getPaginated(): LengthAwarePaginator|array
	{
        return Movie::query()
			->orderByDesc('created_at')
            ->paginate(self::DEFAULT_LIMIT);
    }
}
