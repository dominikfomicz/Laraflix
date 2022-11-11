<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('movie_person', function (Blueprint $table) {
			$table->increments('id');

			$table->integer('movie_id')->unsigned();
			$table->integer('person_id')->unsigned();
			$table->integer('role_id')->unsigned();
		});

		Schema::table('movie_person', static function (Blueprint $table): void {
			$table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
			$table->foreign('person_id')->references('id')->on('persons')->onDelete('cascade');
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('movie_person');
	}
};
