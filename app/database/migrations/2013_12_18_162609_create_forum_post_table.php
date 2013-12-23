<?php

use Illuminate\Database\Migrations\Migration;

class CreateForumPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		//Setup our pages table
		Schema::create('posts', function($table)
		{
			$table->increments('id')->unique();

			$table->integer('thread_id')->unsigned();
			$table->foreign('thread_id')->references('id')->on('threads');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->string('status');
			$table->string('content')->nullable();
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
		//Delete table
		Schema::dropIfExists('posts');
	}

}