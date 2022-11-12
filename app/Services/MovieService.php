<?php

namespace App\Services;

use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Models\Movie;

class MovieService
{
    /**
     * @param  MovieStoreRequest  $request
     * @return Movie
     */
    public function createMovie(MovieStoreRequest $request): Movie
    {
        return Movie::create([
            'user_id' => data_get(auth()->user(), 'id'),
            'title' => data_get($request, 'title'),
        ]);
    }

    /**
     * @param  MovieStoreRequest  $request
     * @param  Movie  $movie
     * @return bool
     */
    public function updateMovie(MovieUpdateRequest $request, Movie $movie): bool
    {
        return $movie->update([
            'user_id' => data_get(auth()->user(), 'id'),
            'title' => data_get($request, 'title'),
        ]);
    }
}
