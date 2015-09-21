<?php
 
class Url extends Eloquent {
 
    protected $table = 'urls';

    static function get_user_urls($user_id)
    {
    	$urls = Url::where('user_id', Auth::user()->id)->get();

    	return $urls;
    }
}