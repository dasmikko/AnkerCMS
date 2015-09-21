@extends('admin.default')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="row">
	<div class="small-12 large-12 columns">
		<h1>Dashboard</h1>
		<p>Welcome back {{ Auth::user()->username }}!</p>
	</div>
</div>


<div class="row">
	<div class="small-4 large-4 columns">
		<h2>Stats</h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Visitors</th>
					<th>Unique visitors</th>
				</tr>
			</thead>
			<tr>
				<td>Today</td>
				<td>None</td>
				<td>None</td>
			</tr>
		</table>
	</div>
	<div class="small-4 large-4 columns">
		<h2>Log</h2>
		<p>Nothing logged yet!</p>
	</div>
	<div class="small-4 large-4 columns">
		<h2>Errors</h2>
		<p>Yay! No errors. :)</p>
	</div>
</div>

@stop {{-- Content end --}}