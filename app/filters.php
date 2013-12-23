<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('/login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic("username");
});

Route::filter('auth.role', function()
{

	// Get Current logged in user
    $user = Auth::user();

    // Check if the user is logged in
    if( Auth::check() && $user->role >= 2 ) 
    {
        // User is admin, let him through!
        //return Redirect::intended();
    }
    else
	{	

		// User is not logged in
		return Redirect::guest('/login')->withErrors("Du skal være logget ind eller være admin!");
	}
});

Route::filter('auth.api', function()
{
	//Get user with the given API Key
	$user = User::where('apikey', '=', Request::header('APIKEY'))->first();
	
	// Give error response if the API-key is wrong
	if(!$user)
	{
		return Response::json(array(
	        'error' => true,
	        'message' => 'Sorry, you gave a wrong API-key'),
	        500
	    );
	}
	


	/*Auth::once($credentials);*/

    /*if (Input::server("token") !== $user->token)
    {
        App::abort(400, "Invalid token");
    }*/

});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});