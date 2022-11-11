<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up()
	{
		Schema::create('movies', function (Blueprint $table) {
			$table->increments('id');

			$table->integer('user_id')->unsigned();
			$table->string('name');

			$table->timestamps();
		});

		Schema::table('movies', static function (Blueprint $table): void {
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	public function down()
	{
		Schema::dropIfExists('movies');
	}
};
