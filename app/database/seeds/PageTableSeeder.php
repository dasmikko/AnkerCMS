<?php
 
class PageTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('pages')->delete();
 
        Page::create(array(
            'parentid' => 0,
            'is_home' => 1,
            'slug' => '',
            'title' => 'Forside',
            'page_title' =>'Velkommen',
            'description' => '<h1>Seeded!</h1>',
        ));

        Page::create(array(
            'parentid' => 0,
            'is_home' => 1,
            'slug' => 'secondpage',
            'title' => 'En side',
            'page_title' =>'En sej side',
            'description' => '<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae, officia alias provident nobis optio harum ut nesciunt totam minima illo quidem ducimus quas aspernatur temporibus unde est quia corrupti eos.</h1>',
        ));
 
        /*Page::create(array(
            'username' => 'seconduser',
            'password' => Hash::make('second_password')
        ));*/
    }
 
}