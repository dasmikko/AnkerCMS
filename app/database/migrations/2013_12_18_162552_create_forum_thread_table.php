<?php

use Illuminate\Database\Migrations\Migration;

class CreateForumThreadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		//Setup our pages table
		Schema::create('threads', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('status');
			$table->string('title');
			$table->string('content');
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
		Schema::drop('threads');
	}

}