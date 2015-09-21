<?php

class UserController extends \BaseController {

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

	public function MyProfile()
	{
		//show all pages
        $view = View::make('user.myprofile');

        $view->page_title = "My profile";
        $view->menu = $this->menu;

        return $view;
	}

	public function update_MyProfile_email()
	{
		// Get current user
        $current_user_id = Auth::user()->id;

        // Find user in DB
        $user = User::findOrFail($current_user_id);

        // Email input field
        $new_email = Input::get('email');


     

        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('user/my_profile')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
        	// Update email
            $user->email = $new_email;
        	$user->save();

        	// Redirect
        	return Redirect::to('user/my_profile')->with('success', 'Email was updated correctly!');
        }

	}


	public function update_MyProfile_password()
	{
		// Get current user
        $current_user_id = Auth::user()->id;

        // Find user in DB
        $user = User::findOrFail($current_user_id);

		// Get input old password
        $input_oldPassword = Input::get('old_password');

        $is_valid_old_password = Hash::check($input_oldPassword, $user->getAuthPassword() );

        if($is_valid_old_password)
        {
			// Rules for my validation
			$rules = array(
			    'new_password' => 'required|min:3|same:verify_password' // password can only be alphanumeric and has to be greater than 3 characters
			);

			// Custom validatin messages
			$messages = array(
			    'same' 		=>	'Both password fields must match.',
			    'old_Password.checkHashedPass' => 'Enter the correct old password'
			);

			// Setup validator
			$validator = Validator::make(Input::all(), $rules, $messages);

			// if the validator fails, redirect back to the form
			if ($validator->fails()) 
			{
			    return Redirect::to('/user/my_profile/')
			        ->withErrors($validator) // send back all errors to the form
			        ->withInput(Input::except('password', 'confirmpassword')); // send back the input (not the password) so that we can repopulate the form
			} 
			else 
			{
				$user->password = Hash::make(Input::get('new_password'));
				$user->save();
				return Redirect::to('/user/my_profile')->with('success', 'Password was updated correctly!');
				
			}
        }
        else
        {
        	return Redirect::to('/user/my_profile')->with('error', 'Old password was not correct');
        }
	}

	public function showLogin()
    {
        // show the form
        $view = View::make('login');

        if (!Auth::check())
        {    
            $view->status = "not logged in";
        }
        else 
        {
            $view->status = "logged in";
        }

        $view->page_title = "Login";
        $view->menu = $this->menu;

        return $view;
    }


    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'username'    => 'required|alphaNum', // make sure the email is an actual email
            'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'username'     => Input::get('username'),
                'password'  => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                return Redirect::intended();

            } else {        

                // validation not successful, send back to form
                //$this->master_template->errors = "Error"; 
                return Redirect::guest('login');

            }

        }
    }

    public function doLogout()
    {
        Auth::logout();

        return Redirect::to('/');
    }


}
