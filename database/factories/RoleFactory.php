<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class RoleFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var class-string<Model|TModel>
	 */
	protected $model = Role::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition(): array
	{
		return [
			'name' => fake()->word(),
			'is_actor' => rand(0, 1),
			'is_producer' => rand(0, 1),
			'is_director' => rand(0, 1),
		];
	}
}
