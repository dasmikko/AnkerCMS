<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		//Setup our pages table
		Schema::create('categories', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('status');
			$table->string('title');
			$table->string('description');
			$table->string('slug');
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
		Schema::drop('categories');
	}

}
