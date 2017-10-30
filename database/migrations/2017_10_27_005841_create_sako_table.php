<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSakoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('profiles', function (Blueprint $table) {
        $table->increments('id');
        $table->string('place_of_birth');
        $table->date('date_of_birth');
        $table->enum('sex', ['Male', 'Female'])->default('Male');
        $table->enum('religion', ['Islam', 'Christian', 'Katholik', 'Buddha', 'Hindu', 'Other'])->default('Other');
        $table->enum('status_marriage', ['Single', 'Married', 'Divorced', 'Death Divorce'])->default('Single');
        $table->enum('citizen', ['WNI','WNA'])->default('WNI');
        $table->text('address');
        $table->string('univercity');
        $table->string('grade');
        $table->float('ipk');
        $table->string('graduation');
      });

      Schema::create('user_profile', function (Blueprint $table) {
        $table->integer('users_id')->unsigned();
        $table->integer('profiles_id')->unsigned();

        $table->foreign('users_id')->references('id')->on('users')
              ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('profiles_id')->references('id')->on('profiles')
              ->onUpdate('cascade')->onDelete('no action');
        $table->primary(['users_id','profiles_id']);
      });

      Schema::create('articles', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('slug');
          $table->string('author')->index()->nullable();
          $table->enum('status',['Draft', 'Publish'])->default('Draft');
          $table->string('images')->nullable()->default('no-image.jpg');
          $table->text('description');
          $table->timestamps();
          $table->SoftDeletes();

          $table->foreign('author')->references('name')->on('users')
                ->onUpdate('cascade')->onDelete('set null');
      });

      Schema::create('request_tours', function (Blueprint $table) {
        $table->increments('id');
        $table->string('code_booking')->unique();
        $table->string('name');
        $table->string('email');
        $table->string('telephone');
        $table->string('location');
        $table->string('duration');
        $table->longtext('note')->nullable();
        $table->enum('status', ['Approved', 'Pending', 'Rejeceted'])->default('Pending');
        $table->timestamps();
        $table->SoftDeletes();
      });

      Schema::create('tours', function (Blueprint $table) {
        $table->increments('tour_id');
        $table->string('title')->index();
        $table->string('slug')->unique();
        $table->string('author')->index()->nullable();
        $table->enum('category',['Domestik','Internasional'])->default('Domestik');
        $table->string('images')->nullable()->default('/photos/no-image.jpg');
        $table->enum('status', ['Draft', 'Publish'])->default('Draft');
        $table->string('duration');
        $table->date('start_period');
        $table->date('end_period');
        $table->integer('price');
        $table->longtext('itinerary');
        $table->longtext('terms_conditions');
        $table->timestamps();
        $table->SoftDeletes();

        $table->foreign('author')->references('name')->on('users')
              ->onUpdate('cascade')->onDelete('set null');
      });

      Schema::create('umrohs', function (Blueprint $table) {
        $table->increments('umroh_id');
        $table->string('title')->index();
        $table->string('slug')->unique();
        $table->string('author')->index()->nullable();
        $table->enum('category',['Ekonomis','Gold','VIP'])->default('Ekonomis');
        $table->string('images')->nullable()->default('/photos/no-image.jpg');
        $table->enum('status', ['Draft', 'Publish'])->default('Draft');
        $table->string('duration');
        $table->date('start_period');
        $table->date('end_period');
        $table->integer('price');
        $table->longtext('itinerary');
        $table->longtext('terms_conditions');
        $table->timestamps();
        $table->SoftDeletes();

        $table->foreign('author')->references('name')->on('users')
        ->onUpdate('cascade')->onDelete('set null');
      });

      Schema::create('booking_tours', function (Blueprint $table) {
        $table->increments('id');
        $table->string('code_booking')->unique();
        $table->string('name');
        $table->string('email');
        $table->string('telephone');
        $table->string('package')->index()->nullable();
        $table->integer('price');
        $table->integer('participant');
        $table->date('departure_date');
        $table->text('note');
        $table->enum('status', ['Approved', 'Pending', 'Rejeceted'])->default('Pending');
        $table->timestamps();
        $table->SoftDeletes();

        $table->foreign('package')->references('title')->on('tours')
              ->onUpdate('cascade')->onDelete('set null');
      });

      Schema::create('booking_umrohs', function (Blueprint $table) {
        $table->increments('id');
        $table->string('code_booking')->unique();
        $table->string('name');
        $table->string('email');
        $table->string('telephone');
        $table->string('package')->index()->nullable();
        $table->integer('price');
        $table->integer('participant');
        $table->enum('status', ['Approved', 'Pending', 'Rejeceted'])->default('Pending');
        $table->timestamps();
        $table->SoftDeletes();

        $table->foreign('package')->references('title')->on('umrohs')
              ->onUpdate('cascade')->onDelete('set null');
      });

      Schema::create('slideshows', function (Blueprint $table) {
        $table->increments('id');
        $table->enum('slug',['tiket','hotel','tour','umroh','promo'])->default('promo');
        $table->string('images');
        $table->enum('status',['Draft','Publish'])->default('Publish');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
        Schema::drop('user_profile');
        Schema::drop('articles');
        Schema::drop('request_tours');
        Schema::drop('tours');
        Schema::drop('umrohs');
        Schema::drop('booking_tours');
        Schema::drop('booking_umrohs');
        Schema::drop('slideshows');
    }
}
