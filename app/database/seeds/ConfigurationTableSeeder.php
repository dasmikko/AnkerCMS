<?php
 
class ConfigurationTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('configurations')->delete();
 
        Configuration::create(array(
            'profile_name'  => "Default",
            'company'       => "AnkerSystems",
            'address'       => 'Lorem ipsum street 20 Denmark',
            'cvr'           => 12345678,
            'phone' 		=> 12345678,
            'email'			=> 'fakeemail@gmail.com',
            'fb_app_id'		=> 'xxxxxx'
        ));
 
        /*Page::create(array(
            'username' => 'seconduser',
            'password' => Hash::make('second_password')
        ));*/
    }
 
}