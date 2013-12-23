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

}