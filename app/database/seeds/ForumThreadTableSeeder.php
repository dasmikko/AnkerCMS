<?php
 
class ForumThreadTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('threads')->delete();
 
        Thread::create(array(
            'user_id' => 1,
            'category_id' => 1,
            'status' => 1,
            'title' => "Dummy Thread",
            'content' => 'Dummy thread. Awesome!',
        ));
    }
 
}