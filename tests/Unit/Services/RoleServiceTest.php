<?php

namespace Services;

use App\Http\Requests\Role\RoleStoreRequest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\RoleService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleServiceTest extends TestCase
{
    use RefreshDatabase;

    private RoleService $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = new RoleService();
    }

    public function testCreate(): void
    {
        $user = User::factory()->create();

        $roleStoreRequest = new RoleStoreRequest();
        $roleStoreRequest->replace([
            'name' => fake()->name(),
            'is_actor' => fake()->boolean(),
            'is_producer' => fake()->boolean(),
            'is_director' => fake()->boolean(),
        ]);

        $this->actingAs($user);

        $this->service->createRole($roleStoreRequest);

        self::assertCount(1, Role::all());
    }

    public function testUpdate(): void
    {
        $user = User::factory()->create();
        $role = Role::factory()->create();

        $roleUpdateRequest = new RoleUpdateRequest();
        $roleUpdateRequest->replace([
            'name' => fake()->name(),
            'is_actor' => fake()->boolean(),
            'is_producer' => fake()->boolean(),
            'is_director' => fake()->boolean(),
        ]);

        $this->actingAs($user);

        $isUpdated = $this->service->updateRole($roleUpdateRequest, $role);

        self::assertTrue($isUpdated);
    }
}
