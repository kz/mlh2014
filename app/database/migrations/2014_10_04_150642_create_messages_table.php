<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Creates the messages table
        Schema::create('messages', function ($table) {
            $table->increments('id');
            $table->boolean('from_tutor');
            $table->integer('tutor_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->text('message');
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
		Schema::drop('messages');
	}

}
