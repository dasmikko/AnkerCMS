<?php
/* 
	Model for Posts table
*/

class Posts extends Eloquent  {

	public function user()
    {
    	// Setup relation ('Table to relate to', 'column to target', 'source column' )
        return $this->hasOne('User', 'id', 'user_id');
    }

    static function get_posts_by_thread_id($id)
    {
    	// Get all posts for the thread with relations
        $posts = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')
    								->where('posts.thread_id', '=', $id)
                                    ->orderBy('created_at', 'asc')
    								->select('posts.id as post_id', 
    									'posts.content', 
    									'posts.created_at',
    									'posts.updated_at',
    									'users.username',
    									'users.avatar',
    									'users.id')->get();

    	return $posts;
    }

    static function get_thread_posts_count($id)
    {
    	return DB::table('posts')->where('posts.thread_id', '=', $id)
    								->count();
    }

    static function add_post($post)
    {
        // Show Page list 
        $post->save();

        return $post->id;
    }

}