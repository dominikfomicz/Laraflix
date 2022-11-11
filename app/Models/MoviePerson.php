<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MoviePerson extends Model
{
	use HasFactory;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'movie_person';

	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'movie_id',
		'person_id',
		'role_id',
	];

	/**
	 * Table: movies
	 * Relation: movies.id = movie_person.movie_id
	 *
	 * @return BelongsTo
	 */
	public function movie(): BelongsTo
	{
		return $this->belongsTo(Movie::class);
	}

	/**
	 * Table: persons
	 * Relation: persons.id = movie_person.person_id
	 *
	 * @return BelongsTo
	 */
	public function person(): BelongsTo
	{
		return $this->belongsTo(Person::class);
	}

	/**
	 * Table: roles
	 * Relation: roles.id = movie_person.role_id
	 *
	 * @return BelongsTo
	 */
	public function role(): BelongsTo
	{
		return $this->belongsTo(Role::class);
	}
}
