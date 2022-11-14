<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\RoleStoreRequest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Http\Resources\Role\RoleCollectionResource;
use App\Models\Role;
use App\Repositories\RoleRepository;
use App\Services\RoleService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class RoleController extends Controller
{
    /**
     * @param  RoleRepository  $repository
     * @param  RoleService  $service
     */
    public function __construct(private RoleRepository $repository, private RoleService $service)
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

    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render(
            'Role/RoleCreate',
        );
    }

    /**
     * @param  RoleStoreRequest  $request
     * @return RedirectResponse|\never
     */
    public function store(RoleStoreRequest $request)
    {
        $role = $this->service->createRole($request);

        if ($role) {
            return redirect()->route('roles.index');
        }

        return abort(500);
    }

    public function show(Role $role)
    {
    }

    /**
     * @param  Role  $role
     * @return Response
     */
    public function edit(Role $role): Response
    {
        return Inertia::render(
            'Role/RoleEdit', [
                'role' => $role
            ]
        );
    }

    /**
     * @param  RoleUpdateRequest  $request
     * @param  Role  $role
     * @return RedirectResponse|\never
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $role = $this->service->updateRole($request, $role);

        if ($role) {
            return redirect()->route('roles.index');
        }

        return abort(500);
    }

    /**
     * @param  Role  $role
     * @return RedirectResponse
     */
    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return redirect()->back();
    }
}
