@extends('default')

@section('content')
<div class="row"> 

  <div class="large-12 columns">
      <h1>Forum!</h1>
      <p><a href="/forum/thread/addthread" class="button tiny">Create Thread</a></p>
      <table>
        <thead>
          <tr>
            <th width="100">User</th>
            <th width="800">Thread Title</th>
            <th># of posts</th>
            <th width="150"></th>
          </tr>
        </thead>
        @foreach ($threads as $thread)
          <tr>
            <td class="text-center">
              {{ $thread['user']['username'] }}
              <div class="user_avatar" style="background-image: url( /media/website/uploads/avatar/{{ $thread['user']['avatar'] }}  )">
              </div>
            </td>
            <td>{{{ $thread['title'] }}}</td>
            <td>{{ $thread['postsAmount'] }}</td>
            <td class="text-center"><a href="/forum/thread/{{ $thread['id'] }}" class="button tiny">View Thread</a></td>
          </tr>
        @endforeach
      </table>
      <p><a href="/forum/thread/addthread" class="button tiny">Create Thread</a></p>

  </div> {{-- Row END--}}

</div>{{-- .row END --}}
@stop