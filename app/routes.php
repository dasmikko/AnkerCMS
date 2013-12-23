<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Admin Routing
Route::group(array('prefix' => 'admin', 'before' => 'auth.role'), function()
{
	// Dashboard
    Route::get('/', 'AdminController@index');

    // Manage blogs
    Route::get('/blogs', array('as' => 'AdminShowBlog', 'uses' => 'AdminBlogController@showBlogs'));
    Route::get('/blogs/edit', 'AdminBlogController@editBlog'); // Show Blog page
    Route::post('/blogs/edit', 'AdminBlogController@addBlog'); // Add the Blog
    Route::get('/blogs/edit/{id}', 'AdminBlogController@editBlog'); // Edit specific Blog page
    Route::post('/blogs/edit/{id}', 'AdminBlogController@updateBlog');
    Route::get('/blogs/delete/{id}', 'AdminBlogController@deleteBlog');
    
    // Manage Pages
    Route::get('/pages', array('as' => 'AdminShowPages', 'uses' => 'AdminPageController@showPages'));
    Route::get('/pages/edit', 'AdminPageController@editPage'); // Show Add page
    Route::post('/pages/edit', 'AdminPageController@addPage'); // Add the page
    Route::get('/pages/edit/{id}', 'AdminPageController@editPage'); // Edit specific page
    Route::post('/pages/edit/{id}', 'AdminPageController@updatePage');
    Route::get('/pages/delete/{id}', 'AdminPageController@deletePage');


    // Manage Users
    Route::get('/users', array('as' => 'AdminShowUsers', 'uses' => 'AdminUserController@index'));
    Route::get('/users/edit', 'AdminUserController@EditUser'); // Show Add page
    Route::post('/users/edit', 'AdminUserController@AddUser'); // Add the page
    Route::get('/users/edit/{id}', 'AdminUserController@EditUser'); // Edit specific page
    Route::post('/users/edit/{id}', 'AdminUserController@UpdateUser');
    Route::get('/users/delete/{id}', 'AdminUserController@DeleteUser');

});

Route::group(array('prefix' => 'forum', 'before' => ''), function()
{
    // Dashboard
    Route::get('/', 'ForumController@index');

    //  Threads
    Route::get('/thread/addthread', 'ForumController@AddThread');
    Route::post('/thread/addthread', 'ForumController@SaveThread');
    Route::get('/thread/{id}', 'ForumController@ViewThread');
    Route::post('/thread/{thread_id}/addpost', 'ForumController@AddPost');

});

// Routes for showing login and logging out
Route::get('/login', array('uses' => 'LoginController@showLogin'));
Route::get('/logout', array('uses' => 'LoginController@doLogout'));

// route to process the login form
Route::post('/login', array('uses' => 'LoginController@doLogin'));



// Route group for API versioning
Route::group(array('prefix' => 'api/v1', 'before' => 'auth.api'), function()
{
    Route::resource('url', 'UrlController');
    Route::resource('url/delete', 'UrlController@destroy');
    Route::resource('url/update', 'UrlController@update');
});

Route::get('/ajax', function()
{
    return View::make('ajax');
});

Route::get('/authtest', array('before' => 'auth.basic', function()
{
    return View::make('hello');
}));




Route::get('/blog/{slug}', 'PageController@blogPage');
Route::get('/blog', 'PageController@blogList');
Route::get('/{slug}', 'PageController@index');

Route::get('/', 'HomeController@index');