@extends('admin.default')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->


	<div class="row">
		<div class="large-12 columns">
			<h1>{{ $header }}</h1>
		</div>
	</div>
			
			{{ Form::open(array('url' => $url, 'files' => true)) }}

			<div class="row">
				<div class="large-4 columns">
					{{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label') ); }}
					{{ Form::text('username', $username, array('class' => 'form-control') )  }}
					@if(!empty($errors->first('username')))
						<div data-alert class="alert-box alert radius">
						 	{{ $errors->first('username') }}
							<a href="#" class="close">&times;</a>
						</div>
					@endif 
				</div>
			</div>

			<div class="row">
				<div class="small-4 columns">
					{{ Form::label('password', 'Password', array('class' => 'col-sm-2 control-label') ); }}
					{{ Form::password('password', array('class' => 'form-control') )  }}  
				</div>

				<div class="small-4 columns">
					{{ Form::label('confirmpassword', 'Confirm Password', array('class' => 'col-sm-2 control-label') ); }}
					{{ Form::password('confirmpassword', array('class' => 'form-control') )  }}
				</div>

				<div class="small-4 columns">
					@if(!empty($errors->first('password')))
						<div data-alert class="alert-box alert radius">
						 	{{ $errors->first('password') }}
							<a href="#" class="close">&times;</a>
						</div>
					@endif 
				</div>
			</div>

			<div class="row">
				<div class="large-4 columns">
					{{ Form::label('role', 'Role' ); }}
					{{ Form::select('role', array('1' => 'User', '2' => 'Admin'), $role);  }}
				</div>
			</div>

			<div class="row">
				<div class="large-12 columns">
					{{ Form::label('avatar', 'Avatar' ); }}
					{{ Form::file('avatar') }}
				</div>
			</div>

			<div class="row">
				<div class="large-4 columns">
					{{ Form::submit( 'Save', array('class' => 'button tiny') ) }}
					{{ link_to_route('AdminShowPages', 'Cancel', $parameters = array(), $attributes = array('class' => 'button alert tiny')) }}
				</div>
			</div>
		 
			{{ Form::close() }}
		</div>

	</div> {{-- Row END--}}

@stop {{-- Content end --}}