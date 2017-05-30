<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

          Schema::create('properties', function (Blueprint $table) {
              $table->increments('id');
              $table->string('category');
              $table->string('location');
              $table->string('registration');
              $table->string('address');
              $table->string('town');
              $table->string('user_id');
              $table->timestamps('created_at');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('properties');
    }
}
