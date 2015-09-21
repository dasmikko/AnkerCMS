@extends('admin.default')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="row">
	<div class="large-12 columns">
		<h1>Blog</h1>
		<p>List of current blog posts</p>
	</div>
</div>
 

	<div class="row">
		<div class="large-12 columns">
			@if(Session::has('success'))    
							<h2><span class="label label-success">{{ Session::get('success') }}</span></h2><br>
			@endif
			<a href="/admin/blogs/edit/" class="button tiny">Add blog post</a>
			<table width="100%">
				<thead>
					<tr>
						<th width="40">ID</th>
						<th>Title</th>
						<th>Slug</th>
						<th width="160">Action</th>
					</tr>
				</thead>
				@foreach ($blogs as $innerArray)
					<tr>
						<td>{{ $innerArray->id }}</td>
						<td>{{ $innerArray->title }}</td>
						<td>
							@if ($innerArray->slug === "")
								/
							@else
								/{{ $innerArray->slug }}
							@endif
						</td>
						<td>
							<ul class="button-group">
								<li><a href="/admin/blogs/edit/{{ $innerArray->id }}" class="button tiny">Edit</a></li>
								<li><a data-reveal-id="delete_modal{{ $innerArray->id }}" class="button alert tiny">Delete</a> </li>
							</ul>

							<div id="delete_modal{{ $innerArray->id }}" class="reveal-modal tiny" data-reveal>
								<h2>Are you sure?</h2>
								<p class="lead">Do you want to delete this blog post?</p>
								<a href="/admin/blogs/delete/{{ $innerArray->id }}" class="button tiny">Yes</a>
								<a class="close-reveal-modal">&#215;</a>
							</div>
							
							
						</td>
					</tr>
				@endforeach
			</table>
			<a href="/admin/pages/edit/" class="button tiny">Add blog post</a>
		</div>

	</div> {{-- Row END--}}


@stop {{-- Content end --}}