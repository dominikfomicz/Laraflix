<?php

namespace App\Http\Resources\MoviePerson;

use App\Http\Resources\Person\PersonSelectCollectionResource;
use App\Http\Resources\Role\RoleSelectCollectionResource;
use App\Models\MoviePerson;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MoviePersonResource extends JsonResource
{
    public function __construct(private MoviePerson $movie)
    {
        parent::__construct($movie);
    }

    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => data_get($this, 'id'),
            'person' => PersonSelectCollectionResource::make(data_get($this, 'person')),
            'role' => RoleSelectCollectionResource::make(data_get($this, 'role')),
        ];
    }
}
