<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Donations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('donations', function(Blueprint $table) {

      $table->increments('id');
      $table->timestamps();
      $table->string('patient_name');
      $table->string('patient_phone');
      $table->integer('city_id')->unsigned();
      $table->string('hospital_name');
      $table->integer('blood_kind_id')->unsigned();
      $table->integer('patient_age');
      $table->string('hospital_address');
      $table->string('details');
      $table->decimal('latitude', 10,8)->nullable();
      $table->decimal('longitude', 10,8)->nullable();
      $table->integer('client_id')->nullable;
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('donations');

    }
}
