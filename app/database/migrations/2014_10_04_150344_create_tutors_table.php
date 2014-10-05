<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Creates the tutors table
        Schema::create('tutors', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->unique();
            $table->string('degree');
            $table->integer('ratings')->default(0);
            $table->integer('rating')->default(0);
            $table->integer('hourly_rate')->default(10);
            $table->text('experience')->nullable();
            $table->integer('matched_user_id')->unsigned()->nullable();
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
		Schema::drop('tutors');
	}

}
