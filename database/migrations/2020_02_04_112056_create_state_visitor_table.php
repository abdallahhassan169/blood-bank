<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStateVisitorTable extends Migration {

	public function up()
	{
		Schema::create('state_visitor', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('state_id');
			$table->integer('visitor_id');
		});
	}

	public function down()
	{
		Schema::drop('state_visitor');
	}
}
