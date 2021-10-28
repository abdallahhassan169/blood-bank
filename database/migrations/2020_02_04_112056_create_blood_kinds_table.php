<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBloodKindsTable extends Migration {

	public function up()
	{
		Schema::create('blood_kinds', function(Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->timestamps();
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('blood_kinds');
	}
}
