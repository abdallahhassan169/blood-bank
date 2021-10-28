<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatesTable extends Migration {

	public function up()
	{
		Schema::create('states', function(Blueprint $table) {
			$table->increments('id')->onDelete('cascade');
			$table->timestamps();
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('states');
	}
}
