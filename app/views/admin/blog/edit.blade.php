@extends('admin.default')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->

<div class="container"> 

  <div class="row">
    <div class="col-md-12">
      <h1>{{ $header }}</h1>

      {{ Form::open(array('url' => $url, 'class' => 'form-horizontal')) }}

      <div class="form-group">
        {{ Form::label('title', 'Title', array('class' => 'col-sm-2 control-label') ); }}
        <div class="col-sm-10">
          {{ Form::text('title', $title, array('class' => 'form-control') )  }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('page_title', 'Page title', array('class' => 'col-sm-2 control-label') ); }}
        <div class="col-sm-10">
          {{ Form::text('page_title', $page_title, array('class' => 'form-control') )  }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('meta_description', 'Meta description', array('class' => 'col-sm-2 control-label') ); }}
        <div class="col-sm-10">
          {{ Form::text('meta_description', $meta_description, array('class' => 'form-control') )  }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('description', 'Description', array('class' => 'col-sm-2 control-label') ); }}
        <div class="col-sm-10">
          {{ Form::textarea('description', $description, array('class' => 'form-control redactor_content') )  }}
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