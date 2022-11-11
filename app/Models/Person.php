<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Person extends Model
{
	use HasFactory;

	protected $table = 'persons';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
	];

	/**
	 * Table: roles
	 * Relations:
	 * roles.id = movie_person.role_id
	 * persons.id = movie_person.person_id
	 * @return HasManyThrough
	 */
	public function roles(): HasManyThrough
	{
		return $this->hasManyThrough(
			Role::class,
			MoviePerson::class,
			'person_id',
			'id',
			'id',
			'role_id'
		);
	}
}
