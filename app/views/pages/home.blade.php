@extends('default')

@section('content')
<div class="container"> 
	<div class="jumbotron">
		<div class="container">
			<h1>Forside</h1>
			<p>Dette er forsiden!</p>
		</div>
	</div>
	<div class="row">
	    <div class="col-md-12">
			{{ $page_description }}
		</div>
	</div>
</div>
@stop