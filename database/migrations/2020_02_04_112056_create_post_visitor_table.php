<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostVisitorTable extends Migration {

	public function up()
	{
		Schema::create('post_visitor', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('post_id');
			$table->integer('visitor_id');
		});
	}

	public function down()
	{
		Schema::drop('post_visitor');
	}
}
