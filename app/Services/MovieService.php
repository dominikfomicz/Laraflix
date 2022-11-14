<?php

namespace App\Services;

use App\Http\Requests\Movie\MovieStoreRequest;
use App\Http\Requests\Movie\MovieUpdateRequest;
use App\Models\Movie;

class MovieService implements MovieServiceInterface
{
    /**
     * Create movie from request data.
     *
     * @param  MovieStoreRequest  $request
     * @return Movie
     */
    public function createMovie(MovieStoreRequest $request): Movie
    {
        $movie = Movie::create([
            'user_id' => data_get(auth()->user(), 'id'),
            'title' => data_get($request, 'title'),
        ]);

        $this->syncMoviePersons($movie, data_get($request, 'movie_persons'));

        return $movie;
    }

    /**
     * Sync movie_person table from request data.
     * Clear add relations for given movie,
     * then attach new ones.
     * Method is used for both creating and updating logic.
     *
     * @param  Movie  $movie
     * @param  array  $moviePersons
     */
    protected function syncMoviePersons(Movie $movie, array $moviePersons): void
    {
        $movie->moviePersons()->delete();

        foreach ($moviePersons as $moviePerson) {
            $movie->moviePersons()->create([
                'person_id' => data_get($moviePerson, 'person.id'),
                'role_id' => data_get($moviePerson, 'role.id'),
            ]);
        }
    }

    /**
     * Update movie from request data.
     *
     * @param  MovieUpdateRequest  $request
     * @param  Movie  $movie
     * @return bool
     */
    public function updateMovie(MovieUpdateRequest $request, Movie $movie): bool
    {
        $this->syncMoviePersons($movie, data_get($request, 'movie_persons'));

        return $movie->update([
            'title' => data_get($request, 'title'),
        ]);
    }
}
