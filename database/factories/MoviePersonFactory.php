<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\MoviePerson;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class MoviePersonFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var class-string<Model|TModel>
	 */
	protected $model = MoviePerson::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition(): array
	{
		return [
			'movie_id' => Movie::factory(),
			'person_id' => Person::factory(),
			'role_id' => Role::factory(),
		];
	}
}
