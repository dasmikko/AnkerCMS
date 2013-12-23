<?php

class ForumController extends BaseController {

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

    /**
     * Show Thread list
     * @return view Return the view to the user
     */
    public function index()
    {
        // Get all threads with relations
        $threads = Thread::all();
        
        // Setup a empty array for out threads
        $threadsContainer = array();

        // Loop for adding threads to our threads array
        foreach ($threads as $thread) 
        {
            // Count all the posts
            $postsAmount = Posts::where('thread_id', '=', $thread->id)->count();

            // Setup array for a single thread
            $SingleThread = array(
                'id' => $thread->id,
                'title' => $thread->title,
                'user' => array(
                        'username' => $thread->user->username,
                        'email' => $thread->user->email,
                    ),
                'postsAmount' => $postsAmount,
            );

            // Add the array we just made!
            $threadsContainer[] = $SingleThread;

        }

        //show all pages
        $view = View::make('forum.default');

        
        // Setup view variables
        $view->page_title = "Threads!";
        $view->threads = $threadsContainer;
        $view->menu = Page::getPagesMenu();

        return $view;

    }

    /**
     * Show a single thread
     * @param [type] $id [description]
     */
    public function ViewThread($id)
    {
        // Get all threads with relations
        $thread = Thread::where('id', '=', $id)->first();

        // Get all posts for the thread with relations
        $posts = Posts::where('thread_id', '=', $id)->get();

        //show all pages
        $view = View::make('forum.thread');

        
        // Setup view variables
        $view->page_title = $thread->title;
        $view->thread = $thread;
        $view->posts = $posts;
        $view->menu = Page::getPagesMenu();
        $view->id = $thread->id;

        return $view;

    }

    /**
     * [AddPost description]
     * @param [int] $thread_id [The thread id]
     *
     * @return  redirect Redirect to the created post
     */
    public function AddPost($thread_id)
    {
        if( !Auth::guest() )
        {
            // Get page
            $post = new Posts;

            // Setup view variables for the view
            $post->thread_id = $thread_id;
            $post->content = Input::get('post_content');
            $post->status = 'active';
            $post->user_id = Auth::user()->id;

            // Show Page list 
            $post->save();

            return Redirect::to('/forum/thread/'.$thread_id.'#'.$post->id);
        }
        else
        {
            Redirect::guest('/login');
        }
        
    }

    public function AddThread() 
    {
        if( !Auth::guest() )
        {
            //show all pages
            $view = View::make('forum.addthread');

            // Setup view variables
            $view->page_title = "Create Thread";
            $view->menu = Page::getPagesMenu();

            return $view;
        }
        else
        {
            Redirect::guest('/login');
        }
    }

    public function SaveThread()
    {
        if( !Auth::guest() )
        {
            // Get page
            $thread = new Thread;

            // Setup view variables for the view
            $thread->title = Input::get('title');;
            $thread->content = Input::get('post_content');
            $thread->status = 'active';
            $thread->user_id = Auth::user()->id;

            // Show Page list 
            $thread->save();

            return Redirect::to('/forum/thread/'.$thread->id);
        }
        else
        {
            Redirect::guest('/login');
        }
        
    }



}