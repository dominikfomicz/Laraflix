<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PersonController extends Controller
{
	public function index()
	{
		return Inertia::render('Person/PersonIndex');
	}

	public function create()
	{
	}

	public function store(Request $request)
	{
	}

	public function show(Person $person)
	{
	}

	public function edit(Person $person)
	{
	}

	public function update(Request $request, Person $person)
	{
	}

	public function destroy(Person $person)
	{
	}
}
