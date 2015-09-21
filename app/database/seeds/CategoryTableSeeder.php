<?php
 
class CategoryTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('categories')->delete();
 
        Category::create(array(
            'status' => 1,
            'title' => 'General',
            'slug' => 'general',
            'description' => 'General Discussion',
        ));
 
       Category::create(array(
            'status' => 1,
            'title' => 'Random',
            'slug' => 'random',
            'description' => 'General Discussion',
        ));
    }
 
}