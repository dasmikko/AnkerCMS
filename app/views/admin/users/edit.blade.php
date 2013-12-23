@extends('admin.default')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->

<div class="container"> 

  <div class="row">
    <div class="col-md-12">
      <h1>{{ $header }}</h1>
      
      {{ Form::open(array('url' => $url, 'class' => 'form-horizontal')) }}

      <div class="form-group">
        {{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label') ); }}
        <div class="col-sm-3">
          {{ Form::text('username', $username, array('class' => 'form-control') )  }}
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
        {{ Form::label('confirmpassword', 'Confirm Password', array('class' => 'col-sm-2 control-label') ); }}
        <div class="col-sm-3">
          {{ Form::password('confirmpassword', array('class' => 'form-control') )  }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('role', 'Role', array('class' => 'col-sm-2 control-label') ); }}
        <div class="col-sm-3">
          {{ Form::select('role', array('1' => 'User', '2' => 'Admin'), $role);  }}
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          {{ Form::submit( 'Save', array('class' => 'btn btn-primary') ) }}
          {{ link_to_route('AdminShowPages', 'Cancel', $parameters = array(), $attributes = array('class' => 'btn btn-default')) }}
        </div>
      </div>
     
      {{ Form::close() }}
    </div>

  </div> {{-- Row END--}}

</div>{{-- .container END --}}
@stop {{-- Content end --}}