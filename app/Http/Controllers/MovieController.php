<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Http\Resources\MovieCollectionResource;
use App\Models\Movie;
use App\Repositories\MovieRepository;
use App\Services\MovieService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class MovieController extends Controller
{
    /**
     * @param  MovieRepository  $repository
     */
    public function __construct(private MovieRepository $repository, private MovieService $service)
    {
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        $movies = MovieCollectionResource::collection(
            $this->repository->getPaginated()
        );

        return Inertia::render(
            'Movie/MovieIndex',
            ['movies' => $movies]
        );
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render(
            'Movie/MovieCreate',
        );
    }

    /**
     * @param  MovieStoreRequest  $request
     * @return RedirectResponse|\never
     */
    public function store(MovieStoreRequest $request)
    {
        $movie = $this->service->createMovie($request);

        if ($movie) {
            return redirect()->route('movies.index');
        }

        return abort(500);
    }

    public function show(Movie $movie)
    {
    }

    /**
     * @param  Movie  $movie
     * @return Response
     */
    public function edit(Movie $movie): Response
    {
        return Inertia::render(
            'Movie/MovieEdit', [
                'movie' => $movie
            ]
        );
    }

    /**
     * @param  MovieUpdateRequest  $request
     * @param  Movie  $movie
     * @return RedirectResponse|\never
     */
    public function update(MovieUpdateRequest $request, Movie $movie)
    {
        $movie = $this->service->updateMovie($request, $movie);

        if ($movie) {
            return redirect()->route('movies.index');
        }

        return abort(500);
    }

    public function destroy(Movie $movie)
    {
    }
}
