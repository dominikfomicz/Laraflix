<?php

namespace App\Http\Resources;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieCollectionResource extends JsonResource
{
    public function __construct(private Movie $movie)
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
            'title' => data_get($this, 'title'),
            'created_at' => data_get($this, 'created_at') ?
                data_get($this, 'created_at')->format('Y-m-d H:i') : '',
            'actions' => $this->getActions()
        ];
    }

    private function getActions()
    {
        if ($this->user_id !== auth()->user()->id) {
            return [];
        }

        return [
            'edit' => route('movies.edit', ['movie' => data_get($this, 'id')]),
            'destroy' => route('movies.destroy', ['movie' => data_get($this, 'id')])
        ];
    }
}
