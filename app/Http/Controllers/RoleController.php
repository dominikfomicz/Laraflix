<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
	public function index()
	{
		return Inertia::render('Role/RoleIndex');
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
