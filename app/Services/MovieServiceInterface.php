<?php

namespace App\Services;

use App\Http\Requests\Movie\MovieStoreRequest;
use App\Http\Requests\Movie\MovieUpdateRequest;
use App\Models\Movie;

interface MovieServiceInterface
{
    /**
     * @param  MovieStoreRequest  $request
     * @return Movie
     */
    public function createMovie(MovieStoreRequest $request): Movie;

    /**
     * @param  MovieUpdateRequest  $request
     * @param  Movie  $movie
     * @return bool
     */
    public function updateMovie(MovieUpdateRequest $request, Movie $movie): bool;
}
