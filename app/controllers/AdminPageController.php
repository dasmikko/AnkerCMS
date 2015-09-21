<?php

class AdminPageController extends \BaseController {

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
	public function showPages()
	{
		// Get all pages
		$allPages = Page::all();

		//show all pages
		$view = View::make('admin.pages.default');

		// Add the AllPages array to the view
		$view->pages = $allPages;

		// Set page title
		$view->page_title = "Pages";

		// Show Page list 
		return $view;
	}

	public function AddPage()
	{
		// Init view
		$view = View::make('admin.pages.edit');

		// Get page
		$page = new Page;

		// Setup view variables for the view
		$page->title = Input::get('title');
		$page->page_title = Input::get('page_title');
		$page->slug = Input::get('slug');
		$page->description = Input::get('description');

		// Show Page list 
		$page->save();

		return Redirect::route('AdminShowPages')->with('success', 'Page was created successfully.');
	}

	public function EditPage($id = null)
	{
		// Init view
		$view = View::make('admin.pages.edit');

		if($id != null) 
		{
			// Get page
			$page = Page::find($id);
		
			// Setup view variables for the view
			$view->header = 'Edit Page';
			$view->url = '/admin/pages/edit/'.$id;
			$view->title = $page->title;
			$view->page_title = $page->page_title;
			$view->slug = $page->slug;
			$view->description = $page->description;

			// Set page title
			$view->page_title = "Edit Page";

		}
		else 
		{
			// Setup view variables for the view
			$view->header = 'Add Page';
			$view->url = '/admin/pages/edit/';
			$view->title = "";
			$view->page_title = "";
			$view->slug = "";
			$view->description = "";

			// Set page title
			$view->page_title = "Add Page";
		}

		// Show Page list 
		return $view;
	}

	public function UpdatePage($id)
	{
		// Init view
		$view = View::make('admin.pages.edit');

		// Get page
		$page = Page::find($id);

		// Setup view variables for the view
		$page->title = Input::get('title');
		$page->page_title = Input::get('page_title');
		$page->slug = Input::get('slug');
		$page->description = Input::get('description');

		// Show Page list 
		$page->save();

		return Redirect::route('AdminShowPages')->with('success', 'Page was updated successfully.');
	}

	public function DeletePage($id) 
	{
		// Find page
		$page = Page::find($id);

		// Delete page
		$page->delete();

		return Redirect::route('AdminShowPages')->with('success', 'Page was deleted successfully.');
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