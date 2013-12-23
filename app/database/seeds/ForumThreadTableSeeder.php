<?php
 
class ForumThreadTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('threads')->delete();
 
        Thread::create(array(
            'user_id' => 1,
            'status' => "active",
            'title' => "Dummy Thread",
            'content' => 'Dummy thread. Awesome!',
        ));
    }
 
}