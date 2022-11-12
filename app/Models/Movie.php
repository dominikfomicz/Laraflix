<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
    ];

    /**
     * Table: users
     * Relation: users.id = movies.user_id
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Table: persons
     * Relations:
     * persons.id = movie_person.person_id
     * movies.id = movie_person.movie_id
     *
     * @return HasManyThrough
     */
    public function persons(): HasManyThrough
    {
        return $this->hasManyThrough(
            Person::class,
            MoviePerson::class,
            'movie_id',
            'id',
            'id'
        );
    }
}
