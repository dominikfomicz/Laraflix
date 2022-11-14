<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'is_actor',
        'is_producer',
        'is_director',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_actor' => 'boolean',
        'is_producer' => 'boolean',
        'is_director' => 'boolean',
    ];

    /**
     * Table: movie_person
     * Relations:
     * movie_person.role_id = roles.id
     *
     * @return HasMany
     */
    public function moviePersons(): HasMany
    {
        return $this->hasMany(MoviePerson::class);
    }
}
