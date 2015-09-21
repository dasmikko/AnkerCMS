@extends('default')

@section('content')
<div class="row"> 

  <div class="large-12 columns">
	  <h1>{{ $thread->title }}</h1>
	  <p><a href="#addpost" class="button tiny">Reply to thread</a></p>
	  <table class="expand" width="100%">
		  <thead>
			<tr>
			  <th width="100">User</th>
			  <th colspan="2">Post</th>
			</tr>
		  </thead>
		  <tr>
			<td class="text-center" width="100">
			  <p>{{ $thread->username }}</p>
			  <img src="/media/website/uploads/avatar/{{ $thread->avatar }}"></td>
			<td colspan="2">{{ $thread->content }}</td>
		  </tr>
		  @if(isset($posts))
		  @foreach ($posts as $post)
			<tr id="{{ $post->post_id }}">
			  <td class="text-center">
				<p>{{ $post->username }}</p>
				<img src="/media/website/uploads/avatar/{{ $post->avatar }}">
			  </td>
			  <td>
				{{ $post->content }}
				
			  </td>
			  <td width="20"><a class="button tiny right" href="#">Quote</a></td>
			</tr>
		  @endforeach
		  @endif

		  @if ( Auth::check() )
		  <tr>
			<td colspan="3" id="addpost">
			  
			  {{ Form::open(array('url' => '/forum/thread/' . $id . '/addpost', 'class' => 'form-horizontal')) }}

		   
				  {{ Form::textarea('post_content', '', array('class' => 'redactor_content') )  }}
				  <br>
			 
				  {{ Form::submit( 'Quick reply', array('class' => 'button tiny') ) }}
						   
			  {{ Form::close() }}
			</td>
		  </tr>
		  @else
		  <tr>
			<td colspan="3" id="addpost" style="text-align: center;">
			  <p>You need to be logged in to post a reply!</p>
			  <a href="/login" class="button tiny">Login</a>
			</td>
		  </tr>
		  @endif
	  </table>

  </div> {{-- Row END--}}

</div>{{-- .container END --}}
@stop