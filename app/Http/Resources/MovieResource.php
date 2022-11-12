<?php

namespace App\Http\Resources;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
	public function __construct(private Movie $movie)
	{
		parent::__construct($movie);
	}

	/**
	 * @param Request $request
	 * @return array
	 */
	public function toArray($request): array
	{
		return [
			'id' => data_get($this, 'id'),
		];
	}
}
