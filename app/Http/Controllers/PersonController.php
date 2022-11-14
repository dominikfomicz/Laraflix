<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonStoreRequest;
use App\Http\Requests\PersonUpdateRequest;
use App\Http\Resources\Person\PersonCollectionResource;
use App\Models\Person;
use App\Repositories\PersonRepository;
use App\Services\PersonService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PersonController extends Controller
{
    /**
     * @param  PersonRepository  $repository
     * @param  PersonService  $service
     */
    public function __construct(
        private PersonRepository $repository,
        private PersonService $service
    ) {
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        $persons = PersonCollectionResource::collection(
            $this->repository->getPaginated()
        );

        return Inertia::render('Person/PersonIndex', [
            'persons' => $persons
        ]);
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render(
            'Person/PersonCreate',
        );
    }

    /**
     * @param  PersonStoreRequest  $request
     * @return RedirectResponse|\never
     */
    public function store(PersonStoreRequest $request)
    {
        $person = $this->service->createPerson($request);

        if ($person) {
            return redirect()->route('persons.index');
        }

        return abort(500);
    }

    public function show(Person $person)
    {
    }

    /**
     * @param  Person  $person
     * @return Response
     */
    public function edit(Person $person)
    {
        return Inertia::render(
            'Person/PersonEdit', [
                'person' => $person
            ]
        );
    }

    /**
     * @param  PersonUpdateRequest  $request
     * @param  Person  $person
     * @return RedirectResponse|\never
     */
    public function update(PersonUpdateRequest $request, Person $person)
    {
        $person = $this->service->updatePerson($request, $person);

        if ($person) {
            return redirect()->route('persons.index');
        }

        return abort(500);
    }

    /**
     * @param  Person  $person
     * @return RedirectResponse
     */
    public function destroy(Person $person): RedirectResponse
    {
        $person->delete();

        return redirect()->back();
    }
}
