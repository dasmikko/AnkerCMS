@extends('default')

@section('content')
<div class="container"> 

  <div class="row">
    <div class="col-md-12">
      <h1>Forum!</h1>
      <p><a href="/forum/thread/addthread" class="btn btn-primary">Create Thread</a></p>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>User</th>
            <th>Thread Title</th>
            <th># of posts</th>
            <th></th>
          </tr>
        </thead>
        @foreach ($threads as $thread)
          <tr>
            <td>
              <p>{{ $thread['user']['username'] }}</p>
              <img src="{{ Gravatar::get_gravatar($thread['user']['email'], 50) }}">
            </td>
            <td>{{{ $thread['title'] }}}</td>
            <td>{{ $thread['postsAmount'] }}</td>
            <td><a href="/forum/thread/{{ $thread['id'] }}">View Thread</a></td>
          </tr>
        @endforeach
      </table>
      <p><a href="/forum/thread/addthread" class="btn btn-primary">Create Thread</a></p>
    </div>

  </div> {{-- Row END--}}

</div>{{-- .container END --}}
@stop