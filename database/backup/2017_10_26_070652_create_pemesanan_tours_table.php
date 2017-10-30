<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesananToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('telp');
            $table->string('package')->index()->nullable();
            $table->integer('price')->index()->nullable();
            $table->date('date');
            $table->integer('peserta');
            $table->text('note');
            $table->enum('status',['Approved', 'Pending', 'Rejected'])->default('Pending');
            $table->timestamps();
            $table->SoftDeletes();

            $table->foreign('package')->references('judul')->on('tours')
                  ->onUpdate('cascade')->onDelete('no action');
            $table->foreign('price')->references('harga')->on('tours')
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
        Schema::dropIfExists('pemesanan_tours');
    }
}
