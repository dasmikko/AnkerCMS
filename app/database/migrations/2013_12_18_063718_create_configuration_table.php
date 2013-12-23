<?php

use Illuminate\Database\Migrations\Migration;

class CreateConfigurationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		//Setup our pages table
		Schema::create('configurations', function($table)
		{
			$table->increments('id');
			$table->string('profile_name');
			$table->string('company');
			$table->string('address');
			$table->integer('cvr');
			$table->integer('phone');
			$table->string('email');
			$table->string('fb_app_id');
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
		Schema::drop('configurations');
	}

}