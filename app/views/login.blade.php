@extends('default')

@section('content')
<div class="container"> 

  	<div class="row">
	  	<div class="col-md-12">
			{{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}
			<h1>Login</h1>

			<!-- if there are login errors, show them here -->
			@if (Session::get('loginError'))
			<div class="alert alert-danger">{{ Session::get('loginError') }}</div>
			@endif
			<p>
				{{ $errors->first('username') }}
				{{ $errors->first('password') }}
				@if( $errors->first('admin') != "" )
				<div class="alert alert-danger">{{ $errors->first('admin') }}</div> 
				@endif	
			</p>

			<div class="form-group">
		        {{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label') ); }}
		        <div class="col-sm-3">
		          {{ Form::text('username', Input::old('username'), array('class' => 'form-control') )  }}
		        </div>
		        <div class="col-sm-3">
		          <span class="label label-danger">{{ $errors->first('username') }}</span>
		        </div>
	      	</div>

	      	<div class="form-group">
		        {{ Form::label('password', 'Password', array('class' => 'col-sm-2 control-label') ); }}
		        <div class="col-sm-3">
		          {{ Form::password('password', array('class' => 'form-control') )  }}
		        </div>
		        <div class="col-sm-3">
		          <span class="label label-danger">{{ $errors->first('password') }}</span>
		        </div>
	      	</div>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  {{ Form::submit( 'Login', array('class' => 'btn btn-primary') ) }}
				</div>
			</div>

			{{ Form::close() }}
		</div>
	</div>

</div>
	
@stop