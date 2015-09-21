@extends('admin.default')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="row">
	<div class="large-12 columns">
		<h1>Users</h1>
		<p>List of all users</p>
	</div>
</div>



	<div class="row">
		<div class="large-12 columns">
			@if(Session::has('success'))    
				<h2><span class="label label-success">{{ Session::get('success') }}</span></h2><br>
			@endif
			<a href="/admin/users/edit/" class="button tiny">Add User</a>
			<table width="100%">
				<thead>
					<tr>
						<th>Avatar</th>
						<th>Username</th>
						<th>Role</th>
						<th>API-Key</th>
						<th width="170">Action</th>
					</tr>
				</thead>
				@foreach ($users as $user)
					<tr>
						<td><img src="/media/website/uploads/avatar/{{ $user->avatar }}"></td>
						<td>{{ $user->username }}</td>
						<td> @if($user->role == 2) Admin @else User @endif</td>
						<td>{{ $user->apikey }}</td>
						<td>
							

							<ul class="button-group">
								<li><a href="/admin/users/edit/{{ $user->id }}" class="button tiny">Edit</a></li>
								<li><a class="button alert tiny" data-reveal-id="delete_modal{{ $user->id }}">Delete</a></li>
							</ul>
							
							<div id="delete_modal{{ $user->id }}" class="reveal-modal tiny" data-reveal>
								<h2>Are you sure?</h2>
								<p class="lead">Do you want to delete this user?</p>
								<a href="/admin/users/delete/{{ $user->id }}" class="button tiny">Yes</a>
								<a class="close-reveal-modal">&#215;</a>
							</div> 
						</td>
					</tr>
				@endforeach
			</table>
			<a href="/admin/users/edit/" class="button tiny">Add User</a>
		</div>

	</div> {{-- Row END--}}


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