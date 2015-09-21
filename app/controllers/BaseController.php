<?php

class BaseController extends Controller {

	public $menu;

	public function __construct() {
		// Generate menu
		$this->menu = $this->generate_menu();
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function generate_menu()
	{
		$allPages = Page::getPagesMenu();

		$menu = "";

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

		// Add forum
		if( Request::segment(1) == "forum" )
		{
			// Add forum to the menu
			$menu .= '<li class="active"><a href="/forum">Forum</a></li>';
		}
		else
		{
			// Add forum to the menu
			$menu .= '<li><a href="/forum">Forum</a></li>';
		}
		

		// Get all Blogs
		$allBlogs = Blog::all();

		if( Request::segment(1) == "blog" )
		{
			$menu .= '<li class="has-dropdown active">';
		}
		else
		{
			$menu .= '<li class="has-dropdown">';
		}
		$menu .= '<a href="/blog">Blog</a>';
		$menu .= '<ul class="dropdown">';

		//Create Menu li's
		foreach ($allBlogs as $blog) 
		{
			if( Request::segment(2) == $blog->title )
			{
				$menu .= '<li class="active"><a href="/blog/'.$blog->title.'">'.$blog->title.'</a></li>';
			}
			else
			{
				$menu .= '<li><a href="/blog/'.$blog->title.'">'.$blog->title.'</a></li>';
			}
					
		}

		$menu .= '</ul></li>';


		return $menu;
	}

}