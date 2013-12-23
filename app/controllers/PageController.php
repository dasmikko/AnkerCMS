<?php

class PageController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@index');
	|
	*/

	public $layout = 'default';

    public function index($slug)
    {
    	// Find the specific page based on slug
    	$page = Page::where('slug', '=', $slug)->firstOrFail();

        //show all pages
        $view = View::make('pages.default');

        $view->page_title = $page->page_title;
        $view->page_description = $page->description;
        $view->menu = Page::getPagesMenu();

        return $view;
    }

    // Show Blog page based on slug
    public function blogPage($slug)
    {
    	/*$blog = Blog::findOrFail(1);
    	$blog = Blog::where('title', '=', $slug)->firstOrFail();

    	$this->layout->page_title = $blog->page_title;

    	// Add mustache template into the $content variable in the master blade template with variables
	    $this->layout->nest('content', 'blog.default', array(
	        'pageHeading' => 'Default Page, Rendered with Mustache.php',
	        'pageContent' => $blog->description
	    ));  */

	    // Get the blog page
		$blog = Blog::findOrFail(1);
    	$blog = Blog::where('title', '=', $slug)->firstOrFail();

		//ssetup view
		$view = View::make('blog.default');

    	$view->page_title = $blog->page_title;
    	$view->description = $blog->description;
    	$view->menu = Page::getPagesMenu();

		return $view; 
    }

    // Show all blog posts
    public function blogList()
    {
    	// Get all blog pages
		$allBlogs = Blog::all();

		//ssetup view
		$view = View::make('blog.list');

		$view->blogs = $allBlogs;
    	$view->page_title = "All blog pages";
    	$view->menu = Page::getPagesMenu();

		return $view;
    }

}