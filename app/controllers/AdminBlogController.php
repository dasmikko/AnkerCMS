<?php

class AdminBlogController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Display the page list
	 * @return View
	 */
	public function showBlogs()
	{
		// Get all pages
		$allBlogs = Blog::all();

		//show all pages
		$view = View::make('admin.blog.default');

		// Add the AllPages array to the view
		$view->blogs = $allBlogs;

		// Show Page list 
		return $view;
	}

	public function AddBlog()
	{
		// Init view
		$view = View::make('admin.blog.edit');

		// Get page
		$blog = new Blog;

		// Setup view variables for the view
		$blog->title = Input::get('title');
		$blog->page_title = Input::get('page_title');
		$blog->description = Input::get('description');
		$blog->meta_description = Input::get('meta_description');

		// Show Page list 
		$blog->save();

		return Redirect::route('AdminShowBlog')->with('success', 'Blog page was created successfully.');
	}

	public function EditBlog($id = null)
	{
		// Init view
		$view = View::make('admin.blog.edit');

		if($id != null) 
		{
			// Get page
			$blog = Blog::find($id);
		
			// Setup view variables for the view
			$view->header = 'Edit Blog';
			$view->url = '/admin/blogs/edit/'.$id;
			$view->title = $blog->title;
			$view->page_title = $blog->page_title;
			$view->description = $blog->description;
			$view->meta_description = $blog->meta_description;

		}
		else 
		{
			// Setup view variables for the view
			$view->header = 'Add Blog';
			$view->url = '/admin/blogs/edit/';
			$view->title = "";
			$view->page_title = "";
			$view->description = "";
			$view->meta_description = "";
		}

		// Show Page list 
		return $view;
	}

	public function UpdateBlog($id)
	{
		// Init view
		$view = View::make('admin.blog.edit');

		// Get page
		$blog = Blog::find($id);

		// Setup view variables for the view
		$blog->title = Input::get('title');
		$blog->page_title = Input::get('page_title');
		$blog->description = Input::get('description');
		$blog->meta_description = Input::get('meta_description');

		// Show Page list 
		$blog->save();

		return Redirect::route('AdminShowBlog')->with('success', 'Blog page was updated successfully.');
	}

	public function DeleteBlog($id) 
	{
		// Find page
		$blog = Blog::find($id);

		// Delete page
		$blog->delete();

		return Redirect::route('AdminShowBlog')->with('success', 'Blog page was deleted successfully.');
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

}