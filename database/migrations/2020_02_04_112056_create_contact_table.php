<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactTable extends Migration {

	public function up()
	{
		Schema::create('contact', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('message');
			$table->string('e_mail');
			$table->string('name');

		});
	}

	public function down()
	{
		Schema::drop('contact');
	}
}
