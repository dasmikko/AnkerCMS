<?php
/* 
	Model for Pages table
*/

class Page extends Eloquent  {

	static function getPagesMenu()
	{
		$allPages = Page::all();

		$menu = "";

		$currentpage = '';
		foreach ($allPages as $page) {
			
			if( Request::segment(1) == $page->slug )
			{
				$menu .= '<li class="active" ><a href="/'.$page->slug.'">'.$page->title.'</a></li>';
			}
			else
			{
				$menu .= '<li><a href="/'.$page->slug.'">'.$page->title.'</a></li>';
			}
		
		}

		// Add forum to the menu
		$menu .= '<li><a href="/forum">Forum</a></li>';

		// Get all Blogs
		$allBlogs = Blog::all();

		if( Request::segment(1) == "blog" )
		{
			$menu .= '<li class="dropdown active">';
		}
		else
		{
			$menu .= '<li class="dropdown ">';
		}
		$menu .= '<a href="/blog" class="dropdown-toggle" data-toggle="dropdown">Blog<b class="caret"></b></a>';
		$menu .= '<ul class="dropdown-menu">';

		/*<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>*/


		//Create Menu li's
		foreach ($allBlogs as $blog) 
		{
			$menu .= '<li><a href="/blog/'.$blog->title.'">'.$blog->title.'</a></li>';		
		}

		$menu .= '</ul></li>';


		return $menu;
	}
}