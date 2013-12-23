<?php

use Illuminate\Database\Migrations\Migration;

class CreatePages extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Setup our pages table
		Schema::create('pages', function($table)
		{
			$table->increments('id');
			$table->integer('parentid')->default(0);
			$table->integer('is_home')->default(0);
			$table->string('slug', 255)->unique();
			$table->string('title', 255);
			$table->string('page_title', 255);
			$table->text('description')->nullable();
			$table->text('extra1')->nullable();
			$table->text('extra2')->nullable();
			$table->text('extra3')->nullable();
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
		// Delete our Pages table
		Schema::drop('pages');
	}

}