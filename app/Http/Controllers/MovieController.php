<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Http\Resources\Movie\MovieCollectionResource;
use App\Http\Resources\MoviePerson\MoviePersonResource;
use App\Http\Resources\Person\PersonSelectCollectionResource;
use App\Http\Resources\Role\RoleSelectCollectionResource;
use App\Models\Movie;
use App\Repositories\MoviePersonRepository;
use App\Repositories\MovieRepository;
use App\Repositories\PersonRepository;
use App\Repositories\RoleRepository;
use App\Services\MovieService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class MovieController extends Controller
{
    /**
     * @param  MovieRepository  $repository
     * @param  MovieService  $service
     * @param  PersonRepository  $personRepository
     * @param  RoleRepository  $roleRepository
     * @param  MoviePersonRepository  $moviePersonRepository
     */
    public function __construct(
        private MovieRepository $repository,
        private MovieService $service,
        private PersonRepository $personRepository,
        private RoleRepository $roleRepository,
        private MoviePersonRepository $moviePersonRepository,
    ) {
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
        $persons = PersonSelectCollectionResource::collection(
            $this->personRepository->getAll()
        );

        $roles = RoleSelectCollectionResource::collection(
            $this->roleRepository->getAll()
        );

        return Inertia::render(
            'Movie/MovieCreate',
            compact('persons', 'roles')
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
     * @throws AuthorizationException
     */
    public function edit(Movie $movie): Response
    {
        $this->authorize('own', $movie);

        $persons = PersonSelectCollectionResource::collection(
            $this->personRepository->getAll()
        );
        $roles = RoleSelectCollectionResource::collection(
            $this->roleRepository->getAll()
        );
        $moviePersons = MoviePersonResource::collection(
            $this->moviePersonRepository->getByMovieId(data_get($movie, 'id'))
        );

        return Inertia::render(
            'Movie/MovieEdit',
            compact('movie', 'persons', 'roles', 'moviePersons')
        );
    }

    /**
     * @param  MovieUpdateRequest  $request
     * @param  Movie  $movie
     * @return RedirectResponse|\never
     * @throws AuthorizationException
     */
    public function update(MovieUpdateRequest $request, Movie $movie)
    {
        $this->authorize('own', $movie);

        $movie = $this->service->updateMovie($request, $movie);

        if ($movie) {
            return redirect()->route('movies.index');
        }

        return abort(500);
    }

    /**
     * @param  Movie  $movie
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Movie $movie): RedirectResponse
    {
        $this->authorize('own', $movie);

        $movie->delete();

        return redirect()->back();
    }
}
