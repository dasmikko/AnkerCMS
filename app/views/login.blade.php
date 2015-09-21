@extends('default')

@section('content')

			{{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}
			<div class="row">
				<div class="large-12 columns">
					<h1>Login</h1>
				</div>
			</div>
			

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

			<div class="row">
				<div class="large-4 columns">
		        {{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label') ); }}
		       
        	  	{{ Form::text('username', Input::old('username'), array('class' => 'form-control') )  }}
		        
				@if (Session::get('loginError'))
          			<span class="label label-danger">{{ $errors->first('username') }}</span>
      			@endif
		        </div>
	      	</div>

	      	<div class="row">
				<div class="large-4 columns">
		        {{ Form::label('password', 'Password', array('class' => 'col-sm-2 control-label') ); }}
		        
	          	{{ Form::password('password', array('class' => 'form-control') )  }}
		        	
	        	@if (Session::get('loginError'))
          			<span class="label label-danger">{{ $errors->first('password') }}</span>
      			@endif
		        </div>
	      	</div>
			
			<div class="row">
				<div class="large-4 columns">
				  {{ Form::submit( 'Login', array('class' => 'button tiny') ) }}
				</div>
			</div>

			{{ Form::close() }}

	
@stop