<?php

class HomeController extends BaseController {

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

	public $master_template = 'default';

    public function index()
    {
        // Get content for the "Home" page
        $page = Page::find(1);

        //show all pages
        $view = View::make('pages.home');

        $view->page_title = "Homepage!";
        $view->page_description = $page->description;
        $view->menu = Page::getPagesMenu();

        return $view;


    	/*// Get content for the "Home" page
    	$page = Page::find(1);

    	// Get all page titles
    	$allPages = Page::all()->toArray();

    	//Setup child content
    	$childContent = array(
            'content' 	=> $page->description,
            'allPages' 	=>	$allPages
	    );

    	// Just for gags, but here we make the array accesable through all views/templates
    	View::share('shareTest', compact('allPages'));

    	// Setup the our view with a master template and child template with the correct content
    	$view = View::make($this->master_template)
    		->nest('content', 'pages.home', compact('childContent')
		);

    	// Set the master template variables
    	$view->page_title = "Forside";

    	// Huzzah! Now we return the the view, containing everything!
		return $view;*/

    }

}