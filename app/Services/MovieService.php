<?php

namespace App\Services;

use App\Http\Requests\MovieStoreRequest;
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
}
