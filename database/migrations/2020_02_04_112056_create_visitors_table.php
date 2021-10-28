<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitorsTable extends Migration {

	public function up()
	{
		Schema::create('visitors', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone')->unique();
			$table->string('e_mail');
			$table->string('password');
			$table->string('name');
			$table->date('date_of_birth');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->string('pin_code')->nullable();
			$table->string('api_token')->unique()->nullable();

		});
	}

	public function down()
	{
		Schema::drop('visitors');
	}
}
