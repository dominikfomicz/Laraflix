<?php

namespace Services;

use App\Http\Requests\Movie\MovieStoreRequest;
use App\Models\User;
use App\Services\MovieService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MovieServiceTest extends TestCase
{
    use RefreshDatabase;

    private MovieService $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = new MovieService();
    }

    public function testCreate(): void
    {
        $user = User::factory()->create();

        self::assertCount(0, $user->movies);

        $movieStoreRequest = new MovieStoreRequest();
        $movieStoreRequest->replace([
            'title' => fake()->sentence(),
            'movie_persons' => []
        ]);

        $this->actingAs($user);

        $this->service->createMovie($movieStoreRequest);

        self::assertCount(1, $user->refresh()->movies);
    }
}
