<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieCollectionResource;
use App\Models\Movie;
use App\Repositories\MovieRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MovieController extends Controller
{
    /**
     * @param  MovieRepository  $repository
     */
    public function __construct(private MovieRepository $repository)
    {
    }

    public function index()
    {
        $movies = MovieCollectionResource::collection($this->repository->getPaginated());

        return Inertia::render('Movie/MovieIndex', ['movies' => $movies]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Movie $movie)
    {
    }

    public function edit(Movie $movie)
    {
    }

    public function update(Request $request, Movie $movie)
    {
    }

    public function destroy(Movie $movie)
    {
    }
}
