@extends('default')

@section('content')
<div class="container"> 

  <div class="row">
    <div class="col-md-12">
      <h1>{{ $thread->title }}</h1>
      <p><a href="#addpost" class="btn btn-primary">Reply to thread</a></p>
      <table class="table table-bordered">
          <tr>
            <td width=20 style="text-align: center;">
              <p>{{ $thread->user->username }}</p>
              <img src="{{ Gravatar::get_gravatar($thread->user->email, 60) }}"></td>
            <td>{{ $thread->content }}</td>
          </tr>
          @if($posts->count() > 0)
          @foreach ($posts as $post)
            <tr id="{{ $post->id }}" class="post">
              <td style="text-align: center;">
                <p>{{ $post->user->username }}</p>
                <img src="{{ Gravatar::get_gravatar($post->user->email, 60) }}">
              </td>
              <td>
                {{ $post->content }}
                <a class="btn btn-default" href="#">Quote</a>
              </td>
            </tr>
          @endforeach
          @endif
          <tr>
            <td colspan=2 width=20 id="addpost">
              
              {{ Form::open(array('url' => '/forum/thread/' . $id . '/addpost', 'class' => 'form-horizontal')) }}

           
                  {{ Form::textarea('post_content', '', array('class' => 'redactor_content') )  }}
                  <br>
             
                  {{ Form::submit( 'Quick reply', array('class' => 'btn btn-default') ) }}
                           
              {{ Form::close() }}
            
            </td>
          </tr>
      </table>
    </div>

  </div> {{-- Row END--}}

</div>{{-- .container END --}}
@stop