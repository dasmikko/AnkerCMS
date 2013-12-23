<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
 
        User::create(array(
            'username' => 'demo',
            'password' => Hash::make('12345678'),
            'email' => 'demo@gmail.com',
            'role' => 2,
        ));
 
        User::create(array(
            'username' => 'seconduser',
            'password' => Hash::make('12345678'),
            'email' => 'fakeemail@gmail.com',
            'role' => 1,
        ));

        User::create(array(
            'username' => 'thirduser',
            'password' => Hash::make('12345678'),
            'email' => 'fakeemail2@gmail.com',
            'role' => 1,
        ));
    }
 
}