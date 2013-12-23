<?php
 
class BlogTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('blogs')->delete();
 
        Blog::create(array(
            'user_id' => 1,
            'title' => "Dummy",
            'page_title' => "Dummy Page",
            'description' => 'Dummy Blog Page',
            'meta_description' => 'Meta description',
        ));
    }
 
}