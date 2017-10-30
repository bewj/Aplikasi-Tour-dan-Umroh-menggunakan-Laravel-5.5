<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUmrohsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umrohs', function (Blueprint $table) {
          $table->increments('umroh_id');
          $table->string('judul')->index();
          $table->string('slug')->unique();
          $table->string('author')->index();
          $table->enum('package', ['Ekonomis','Gold','VIP'])->default('Ekonomis');
          $table->string('images')->nullable()->default('no-image.jpg');
          $table->string('durasi');
          $table->date('awalperiode');
          $table->date('akhirperiode');
          $table->integer('harga')->index();
          $table->text('itinerary');
          $table->text('syarat');
          $table->timestamps();
          $table->SoftDeletes();

          $table->foreign('author')->references('name')->on('users')
                ->onUpdate('cascade')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('umrohs');
    }
}
