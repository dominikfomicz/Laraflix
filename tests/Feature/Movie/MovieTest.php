<?php

namespace Movie;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use RefreshDatabase;

    public function testLoggedInUserSeesListOfMovies(): void
    {
        $response = $this
            ->actingAs(User::factory()->create())
            ->json('GET', route('movies.index'));

        $response->assertStatus(200);
    }

    public function testLoggedInUserAddsMovie(): void
    {
        $response = $this
            ->actingAs(User::factory()->create())
            ->json('POST', route('movies.store'), [
                'title' => fake()->sentence(),
                'movie_persons' => []
            ]);

        $response->assertStatus(302);
    }

    public function testLoggedInUserDeletesOwnMovie(): void
    {
        $user = User::factory()->create();
        $movie = Movie::factory()->create(['user_id' => $user->id]);

        $response = $this
            ->actingAs($user)
            ->json('DELETE', route('movies.destroy', ['movie' => $movie->id]));

        $response->assertStatus(302);

        $this->assertDatabaseCount('movies', 0);
    }

    public function testLoggedInUserDeletesNotOwnMovie(): void
    {
        $firstUser = User::factory()->create();
        $secondUser = User::factory()->create();
        $movie = Movie::factory()->create(['user_id' => $firstUser->id]);

        $response = $this
            ->actingAs($secondUser)
            ->json('DELETE', route('movies.destroy', ['movie' => $movie->id]));

        $response->assertStatus(403);

        $this->assertDatabaseCount('movies', 1);
    }

    public function testLoggedOutUserCanNotSeeListOfMovies(): void
    {
        $response = $this->json('GET', route('movies.index'));

        $response->assertStatus(401);
    }

    public function testLoggedOutUserCanNotSeeListDeleteMovie(): void
    {
        $movie = Movie::factory()->create();

        $response = $this->json('DELETE', route('movies.destroy', ['movie' => $movie->id]));

        $response->assertStatus(401);

        $this->assertDatabaseCount('movies', 1);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }
}
