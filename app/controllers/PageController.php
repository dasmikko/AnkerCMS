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


    /**
     * Show page
     * @param  [type] $slug 
     * @return [type]       
     */
    public function index($slug)
    {
    	// Find the specific page based on slug
    	$page = Page::where('slug', '=', $slug)->first();

        //show all pages
        $view = View::make('pages.default');

        if (!isset($page))
        {
            App::abort(404);
        }

        $view->page_title = $page->page_title;
        $view->page_description = $page->description;
        $view->menu = $this->menu;

        return $view;
    }

    /**
     * Show homepage
     * @return [type]
     */
    public function home()
    {
        // Get content for the "Home" page
        $page = Page::find(1);

        //show all pages
        $view = View::make('pages.home');

        $view->page_title = "Homepage!";
        $view->page_description = $page->description;
        $view->menu = $this->menu;

        return $view;

    }

    public function error404()
    {
        //show 404 page
        $view = View::make('errors.404');

        $view->page_title = "Page was not found!";
        $view->page_description = "Sorry, the page could not be found...";
        $view->menu = Page::getPagesMenu();

        return $view;
    }

}