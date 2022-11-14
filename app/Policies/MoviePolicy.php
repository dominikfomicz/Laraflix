<?php

namespace App\Policies;

use App\Models\Movie;
use App\Models\User;

class MoviePolicy
{
    /**
     * Checks if user owns movie
     *
     * @param  User  $user
     * @param  Movie  $movie
     * @return bool
     */
    public function own(User $user, Movie $movie): bool
    {
        return $movie->user->is($user);
    }
}
