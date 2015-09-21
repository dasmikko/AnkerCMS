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
        $threads = Thread::get_threads();
        
        // Setup a empty array for out threads
        $threadsContainer = array();

        // Loop for adding threads to our threads array
        foreach ($threads as $thread) 
        {
            // Count all the posts
            $postsAmount = Posts::get_thread_posts_count($thread->id);

            // Setup array for a single thread
            $SingleThread = array(
                'id' => $thread->id,
                'title' => $thread->title,
                'user' => array(
                        'username' => $thread->username,
                        'avatar' => $thread->avatar,
                    ),
                'postsAmount' => $postsAmount,
            );

            // Add the array we just made!
            $threadsContainer[] = $SingleThread;

        }

        // Load helpers
        $helpers = new Helpers;

        //show all pages
        $view = View::make('forum.default');

        
        // Setup view variables
        $view->page_title = "Threads!";
        $view->threads = $threadsContainer;
        $view->menu = $this->menu;
    
        return $view;

    }

    /**
     * Show a single thread
     * @param [type] $id [description]
     */
    public function ViewThread($id)
    {
        // Get all threads with relations
        //$thread = Thread::where('id', '=', $id)->first();
        $thread = Thread::get_thread_by_id($id);


        // Get all posts for the thread with relations
        $posts = Posts::get_posts_by_thread_id($id);

        //show all pages
        $view = View::make('forum.thread');

        // Setup view variables
        $view->page_title = $thread->title;
        $view->thread = $thread;
        $view->posts = $posts;
        $view->menu = $this->menu;
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
        // Init new Posts
        $post = new Posts;

        // Setup new post
        $post->thread_id = $thread_id;
        $post->content = Input::get('post_content');
        $post->status = 'active';
        $post->user_id = Auth::user()->id;

        $status = Posts::add_post($post);

        if($status > 0)
        {
            return Redirect::to('/forum/thread/'.$thread_id.'#'.$post->id);
        }
        else 
        {
            return Redirect::to('/forum');   
        }        
    }

    public function AddThread() 
    {
        //show all pages
        $view = View::make('forum.addthread');

        // Setup view variables
        $view->page_title = "Create Thread";
        $view->menu = $this->menu;

        return $view;
    }

    public function SaveThread()
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

}