<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_tours', function (Blueprint $table) {
          $table->increments('id');
          $table->string('location');
          $table->string('day');
          $table->string('name');
          $table->string('handphone');
          $table->string('email');
          $table->text('note')->nullable();
          $table->timestamps();
          $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_tours');
    }
}
