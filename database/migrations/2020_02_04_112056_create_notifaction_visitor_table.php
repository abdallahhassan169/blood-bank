<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotifactionVisitorTable extends Migration {

	public function up()
	{
		Schema::create('notifaction_visitor', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('is_read');
			$table->integer('visitor_id');
			$table->integer('notifacation_id');
		});
	}

	public function down()
	{
		Schema::drop('notifaction_visitor');
	}
}
