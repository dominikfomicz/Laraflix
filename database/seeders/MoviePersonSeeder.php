<?php

namespace Database\Seeders;

use App\Models\MoviePerson;
use Illuminate\Database\Seeder;

class MoviePersonSeeder extends Seeder
{
	public function run()
	{
		MoviePerson::factory(10)->create();
	}
}
