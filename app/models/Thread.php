<?php
/* 
	Model for Thread table
*/

class Thread extends Eloquent  {

	public function user()
    {
    	// Setup relation ('Table to relate to', 'column to target', 'source column' )
        return $this->hasOne('User', 'id', 'user_id');
    }

    static function get_threads()
    {
    	return DB::table('threads')->join('users', 'threads.user_id', '=', 'users.id')
    								->get();
    }

    static function get_thread_by_id($id)
    {
    	return DB::table('threads')->join('users', 'threads.user_id', '=', 'users.id')
    								->where('threads.id', '=', $id)
    								->first();
    }

}