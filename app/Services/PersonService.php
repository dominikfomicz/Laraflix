<?php

namespace App\Services;

use App\Http\Requests\Person\PersonStoreRequest;
use App\Http\Requests\Person\PersonUpdateRequest;
use App\Models\Person;

class PersonService implements PersonServiceInterface
{
    /**
     * Create person from request data.
     *
     * @param  PersonStoreRequest  $request
     * @return Person
     */
    public function createPerson(PersonStoreRequest $request): Person
    {
        return Person::create([
            'name' => data_get($request, 'name'),
        ]);
    }

    /**
     * Update person from request data.
     *
     * @param  PersonUpdateRequest  $request
     * @param  Person  $person
     * @return bool
     */
    public function updatePerson(PersonUpdateRequest $request, Person $person): bool
    {
        return $person->update([
            'name' => data_get($request, 'name'),
        ]);
    }
}
