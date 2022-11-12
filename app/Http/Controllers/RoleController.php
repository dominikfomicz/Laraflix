<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleCollectionResource;
use App\Models\Role;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RoleController extends Controller
{
    /**
     * @param  RoleRepository  $repository
     */
    public function __construct(private RoleRepository $repository)
    {
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        $roles = RoleCollectionResource::collection(
            $this->repository->getPaginated()
        );

        return Inertia::render('Role/RoleIndex', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Role $role)
    {
    }

    public function edit(Role $role)
    {
    }

    public function update(Request $request, Role $role)
    {
    }

    public function destroy(Role $role)
    {
    }
}
