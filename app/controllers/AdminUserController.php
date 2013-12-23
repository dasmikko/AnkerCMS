<?php

class AdminUserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Get all pages
		$allUsers = User::all();

		//show all pages
		$view = View::make('admin.users.default');

		// Add the AllPages array to the view
		$view->users = $allUsers;

		// Show Page list 
		return $view;
	}

	public function AddUser()
	{
		// Init User
		$user = new User;

		// Rules for my validation
		$rules = array(
            'username'    => 'required|alphaNum', // make sure the email is an actual email
            'password' => 'required|min:3|same:confirmpassword' // password can only be alphanumeric and has to be greater than 3 characters
        );

		// Custom validatin messages
        $messages = array(
		    'required' 	=> 	'The :attribute field is required.',
		    'same' 		=>	'Both password fields must match.'
		);

        // Setup validator
		$validator = Validator::make(Input::all(), $rules, $messages);

		// if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('/admin/users/edit')
                ->withErrors($validator) // send back all errors to the form
                ->withInput(Input::except('password', 'confirmpassword')); // send back the input (not the password) so that we can repopulate the form
        } else {

			// Setup new user varibles
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->role = Input::get('role');

			// Show Page list 
			$user->save();

			return Redirect::route('AdminShowUsers')->with('success', 'User Created Successfully.');
			}
	}

	public function EditUser($id = null)
	{
		// Init view
		$view = View::make('admin.users.edit');

		if($id != null) 
		{
			// Get user
			$user = User::find($id);
		
			// Setup view variables for the view
			$view->header = 'Edit User';
			$view->url = '/admin/users/edit/'.$id;
			$view->username = $user->username;
			$view->role = $user->role;

		}
		else 
		{
			// Setup view variables for the view
			$view->header = 'Add User';
			$view->url = '/admin/users/edit/';
			$view->username = "";
			$view->role = 1;
		}

		// Show User 
		return $view;
	}

	public function UpdateUser($id)
	{
		// Init view
		$view = View::make('admin.users.edit');

		// Get user
		$user = User::find($id);

		// Only update password if user has entered one, and then validate it
		if(Input::get('password') != null ) 
		{	
			// Rules for my validation
			$rules = array(
	            'password' => 'required|min:3|same:confirmpassword' // password can only be alphanumeric and has to be greater than 3 characters
	        );

			// Custom validatin messages
	        $messages = array(
			    'same' 		=>	'Both password fields must match.'
			);

	        // Setup validator
			$validator = Validator::make(Input::all(), $rules, $messages);

			// if the validator fails, redirect back to the form
	        if ($validator->fails()) {
	            return Redirect::to('/admin/users/edit/'.$id)
	                ->withErrors($validator) // send back all errors to the form
	                ->withInput(Input::except('password', 'confirmpassword')); // send back the input (not the password) so that we can repopulate the form
	        } else {
				$user->password = Hash::make(Input::get('password'));
			}
		}
		

		// Setup view variables for the view
		$user->username = Input::get('username');
		$user->role = Input::get('role');

		
		// Save user
		$user->save();

		// Redirect to User list
		return Redirect::route('AdminShowUsers');
		
	}

	public function DeleteUser($id) 
	{
		// Find page
		$user = User::find($id);

		// Delete page
		$user->delete();

		return Redirect::route('AdminShowUsers')->with('success', 'User Deleted Successfully.');
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