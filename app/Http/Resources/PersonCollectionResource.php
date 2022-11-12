<?php

namespace App\Http\Resources;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonCollectionResource extends JsonResource
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
            'created_at' => data_get($this, 'created_at') ? data_get($this, 'created_at')->format('Y-m-d H:i') : '',
        ];
    }
}
