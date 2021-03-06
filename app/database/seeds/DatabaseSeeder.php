<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('PageTableSeeder');
		$this->call('BlogTableSeeder');
		$this->call('ConfigurationTableSeeder');
		$this->call('ForumThreadTableSeeder');
		$this->call('ForumPostsTableSeeder');
		$this->call('CategoryTableSeeder');

	}

}