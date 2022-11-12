<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonCollectionResource;
use App\Models\Person;
use App\Repositories\PersonRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PersonController extends Controller
{
    /**
     * @param  PersonRepository  $repository
     */
    public function __construct(private PersonRepository $repository)
    {
    }

    public function index()
    {
        $persons = PersonCollectionResource::collection($this->repository->getPaginated());

        return Inertia::render('Person/PersonIndex', [
            'persons' => $persons
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Person $person)
    {
    }

    public function edit(Person $person)
    {
    }

    public function update(Request $request, Person $person)
    {
    }

    public function destroy(Person $person)
    {
    }
}
