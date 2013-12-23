@extends('admin.default')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <h1>Users</h1>
    <p>List of all users</p>
  </div>
</div>

<div class="container"> 

  <div class="row">
    <div class="col-md-12">
      @if(Session::has('success'))    
              <h2><span class="label label-success">{{ Session::get('success') }}</span></h2><br>
      @endif
      <a href="/admin/users/edit/" class="btn btn-primary">Add User</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Avatar</th>
            <th>Username</th>
            <th>Role</th>
            <th>API-Key</th>
            <th>Action</th>
          </tr>
        </thead>
        @foreach ($users as $user)
          <tr>
            <td><img src="{{ Gravatar::get_gravatar($user->email, 35) }}"></td>
            <td>{{ $user->username }}</td>
            <td> @if($user->role == 2) Admin @else User @endif</td>
            <td>{{ $user->apikey }}</td>
            <td>
              <a href="/admin/users/edit/{{ $user->id }}" class="btn btn-default">Edit</a>
              <a href="/admin/users/delete/{{ $user->id }}" title="Do want to delete this user: {{ $user->username }}?" class="btn btn-danger showDelete">Delete</a> 
            </td>
          </tr>
        @endforeach
      </table>
      <a href="/admin/users/edit/" class="btn btn-primary">Add User</a>
    </div>

  </div> {{-- Row END--}}

</div>{{-- .container END --}}

<script type="text/javascript">
  //This makes you confirm for page delete
  $(function() {
    $('.showDelete').click(function(e) {
      var title = $(this).attr( 'title' );
      if (!confirm(title)){
        return false;
      }
    });
  });
</script>
@stop {{-- Content end --}}