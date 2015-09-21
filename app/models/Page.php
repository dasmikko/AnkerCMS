<?php
/* 
	Model for Pages table
*/

class Page extends Eloquent  {

	static function getPagesMenu()
	{
		$allPages = Page::all();

		return $allPages;
	}
}