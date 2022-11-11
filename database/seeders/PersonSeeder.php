<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
	public function run()
	{
		Person::factory(10)->create();
	}
}
