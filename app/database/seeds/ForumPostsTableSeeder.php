<?php
 
class ForumPostsTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('posts')->delete();
 
        Posts::create(array(
            'thread_id' => 1,
            'user_id' => 1,
            'status' => "active",
            'content' => 'Dummy posts. Nice thread!',
        ));

        Posts::create(array(
            'thread_id' => 1,
            'user_id' => 1,
            'status' => "active",
            'content' => 'Dummy posts. Nice thread!',
        ));
    }
 
}