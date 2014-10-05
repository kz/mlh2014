<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Creates the users table
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->boolean('is_tutor');
            $table->string('phone_number')->unique();
            $table->string('email_address')->unique();
            $table->string('password');
            $table->text('home_address');
            $table->integer('matched_tutor_id')->unsigned()->nullable();
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
        Schema::drop('users');
	}

}
