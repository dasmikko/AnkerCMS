@extends('default')

@section('content')
<div class="row">
	<div class="large-12 columns">
		<h1>My Profile</h1>
		@if(Session::has('success'))
			<div data-alert class="alert-box success radius">
			 	{{ Session::get('success') }}
				<a href="#" class="close">&times;</a>
			</div>   
		@endif
		@if(Session::has('error'))
			<div data-alert class="alert-box alert radius">
			 	{{ Session::get('error') }}
				<a href="#" class="close">&times;</a>
			</div>   
		@endif
	</div>
</div>
<div class="row">
	<div class="large-12 column">
		<dl class="tabs vertical" data-tab>
			<dd class="active"><a href="#email"><i class="fa fa-envelope-o"></i> Email</a></dd>
			<dd><a href="#user"><i class="fa fa-user"></i> User info</a></dd>
			<dd><a href="#password"><i class="fa fa-lock"></i> Password</a></dd>
		</dl>
		<div class="tabs-content vertical">
			<div class="content active" id="email">
				<p>Current Email: {{ Auth::user()->email }}
				

				{{ Form::open(array('url' => '/user/my_profile/update_email', 'class' => '')) }}
				
				{{ Form::token() }}

				<div class="row collapse">
					<div class="small-2 large-2 columns">
						<span class="prefix">Email</span>
					</div>
					<div class="small-5 large-5 columns end ">
						{{ Form::email('email', '', array('class' => 'form-control') )  }}
						<div class="alert alert-danger"></div>

						@if( $errors->first('email') != "" ) 
						<div data-alert class="alert-box alert radius">
						 	{{ $errors->first('email') }}
						  	<a href="#" class="close">&times;</a>
						</div>
						@endif

					</div>
				</div>

				      
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  {{ Form::submit( 'Update email', array('class' => 'button tiny') ) }}
					</div>
				</div>             
			                           
		      	{{ Form::close() }}
			</div>
			<div class="content" id="user">
				<h2>Personal information</h2>
				Username: {{ Auth::user()->username }}
			</div>
			<div class="content" id="password">
				{{ Form::open(array('url' => '/user/my_profile/update_password', 'class' => '')) }}
				
				{{ Form::token() }}

				<div class="row">
					<div class="small-5 large-5 columns">
						<label>Old Password
				        	{{ Form::password('old_password', '', array('class' => 'form-control') )  }}
				        	
				        	@if( $errors->first('old_password') != "" ) 
				        	<div data-alert class="alert-box alert radius">
				        	 	{{ $errors->first('old_password') }}
				        	  	<a href="#" class="close">&times;</a>
				        	</div>
				        	@endif
				      	</label>
					</div>
				</div>

				<div class="row">
					<div class="small-5 large-5 columns">
						<label>New Password
				        	{{ Form::password('new_password', '', array('class' => 'form-control') )  }}

				        	@if( $errors->first('new_password') != "" ) 
				        	<div data-alert class="alert-box alert radius">
				        	 	{{ $errors->first('new_password') }}
				        	  	<a href="#" class="close">&times;</a>
				        	</div>
				        	@endif
				      	</label>
					</div>
				</div>

				<div class="row">
					<div class="small-5 large-5 columns">
						<label>Verify Password
				        	{{ Form::password('verify_password', '', array('class' => 'form-control') )  }}
				        	@if( $errors->first('verify_password') != "" ) 
				        	<div data-alert class="alert-box alert radius">
				        	 	{{ $errors->first('verify_password') }}
				        	  	<a href="#" class="close">&times;</a>
				        	</div>
				        	@endif
				      	</label>
					</div>
				</div>

				      
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  {{ Form::submit( 'Update password', array('class' => 'button tiny') ) }}
					</div>
				</div>             
			                           
		      	{{ Form::close() }}
			</div>
		</div>
		
	</div>
</div>
@stop