<?php

class BlogController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Get all blog pages
		$allBlogs = Blog::all();

		//ssetup view
		$view = View::make('blog.list');

		$view->blogs = $allBlogs;
    	$view->page_title = "All blog pages";
    	$view->menu = $this->menu;

		return $view;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	    // Show Blog page based on slug
    public function blogPage($slug)
    {
    	// Get the blog page
		$blog = Blog::findOrFail(1);
    	$blog = Blog::where('title', '=', $slug)->firstOrFail();

		//ssetup view
		$view = View::make('blog.default');

    	$view->page_title = $blog->page_title;
    	$view->description = $blog->description;
    	$view->menu = $this->menu;

		return $view; 
    }

    // Show all blog posts
    public function blogList()
    {
    	
    }


}
