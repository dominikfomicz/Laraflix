<?php

namespace App\Http\Resources\Person;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonSelectCollectionResource extends JsonResource
{
    public function __construct(private Person $person)
    {
        parent::__construct($person);
    }

    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => data_get($this, 'id'),
            'name' => data_get($this, 'name'),
        ];
    }
}
