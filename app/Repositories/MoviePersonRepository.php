<?php

namespace App\Repositories;

use App\Models\MoviePerson;
use Illuminate\Database\Eloquent\Collection;

class MoviePersonRepository extends Repository
{

    /**
     * Get list of movie persons
     * by movie's id
     *
     * @param  int  $movieId
     * @return Collection
     */
    public function getByMovieId(int $movieId): Collection
    {
        return MoviePerson::query()
            ->where('movie_id', $movieId)
            ->with([
                'person',
                'role'
            ])
            ->get();
    }
}
