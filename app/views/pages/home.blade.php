@extends('default')

@section('content')
<div class="row">
	<div class="large-12 columns"> 
		<h1>Forside</h1>
			<p>Dette er forsiden!</p>
	</div>
</div>
<div class="row">
    <div class="large-12 columns">
		{{ $page_description }}
	</div>
</div>
@stop