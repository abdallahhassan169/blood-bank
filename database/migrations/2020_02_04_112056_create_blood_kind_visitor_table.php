<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBloodKindVisitorTable extends Migration {

	public function up()
	{
		Schema::create('blood_type_visitor', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('blood_kind_id');
			$table->integer('visitor_id');
		});
	}

	public function down()
	{
		Schema::drop('blood_kind_visitor');
	}
}
