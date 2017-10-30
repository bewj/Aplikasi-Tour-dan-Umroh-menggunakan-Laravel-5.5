<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('slug');
            $table->string('author')->index();
            $table->enum('status',['Draft', 'Publish'])->default('Draft');
            $table->string('images')->nullable()->default('no-image.jpg');
            $table->text('deskripsi');
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
        Schema::dropIfExists('artikels');
    }
}
