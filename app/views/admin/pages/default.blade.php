@extends('admin.default')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->

<div class="row">
	<div class="small-12 large-12 columns">
		<h1>Pages</h1>
		<p>List of current pages</p>
	</div>
</div>



	<div class="row">
		<div class="large-12 columns">
			@if(Session::has('success'))
				<div data-alert class="alert-box success radius">
				 	{{ Session::get('success') }}
					<a href="#" class="close">&times;</a>
				</div>   
			@endif
			<a href="/admin/pages/edit/" class="button tiny"><i class="fa fa-plus-circle"></i> Add page</a>
			<table width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Slug</th>
						<th>Action</th>
					</tr>
				</thead>
				@foreach ($pages as $innerArray)
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
								<li><a href="/admin/pages/edit/{{ $innerArray->id }}" class="button tiny"><i class="fa fa-cog"></i> Edit</a></li>
								<li><a class="button alert tiny" data-reveal-id="delete_modal{{ $innerArray->id }}"><i class="fa fa-minus-circle"></i> Delete</a></li>
							</ul>
							
							<div id="delete_modal{{ $innerArray->id }}" class="reveal-modal tiny" data-reveal>
								<h2>Are you sure?</h2>
								<p class="lead">Do you want to delete this page?</p>
								<a href="/admin/pages/delete/{{ $innerArray->id }}" class="button tiny">Yes</a>
								<a class="close-reveal-modal">&#215;</a>
							</div>
							 
						</td>
					</tr>
				@endforeach
			</table>
			<a href="/admin/pages/edit/" class="button tiny"><i class="fa fa-plus-circle"></i> Add page</a>
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