<?php

namespace App\Services;

use App\Http\Requests\Person\PersonStoreRequest;
use App\Http\Requests\Person\PersonUpdateRequest;
use App\Models\Person;

interface PersonServiceInterface
{
    /**
     * @param  PersonStoreRequest  $request
     * @return Person
     */
    public function createPerson(PersonStoreRequest $request): Person;

    /**
     * @param  PersonUpdateRequest  $request
     * @param  Person  $person
     * @return bool
     */
    public function updatePerson(PersonUpdateRequest $request, Person $person): bool;
}
