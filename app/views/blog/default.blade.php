@extends('default')

@section('content')
<div class="container"> 

  <div class="row">
    <div class="col-md-12">
      	{{ $description }}
	</div>
	<div class="col-md-12">    
		<hr>
    	<div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-colorscheme="light"></div>
	</div>
  </div> {{-- Row END--}}

</div>{{-- .container END --}}
@stop