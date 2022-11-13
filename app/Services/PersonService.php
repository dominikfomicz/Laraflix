<?php

namespace App\Services;

use App\Http\Requests\PersonStoreRequest;
use App\Http\Requests\PersonUpdateRequest;
use App\Models\Person;

class PersonService
{
    /**
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
