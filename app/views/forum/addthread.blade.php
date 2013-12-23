@extends('default')

@section('content')
<div class="container"> 

  <div class="row">
    <div class="col-md-12">
      <h1>Create Thread</h1>
      
      {{ Form::open(array('url' => '/forum/thread/addthread', 'class' => 'form-horizontal')) }}

      <div class="form-group">
        {{ Form::label('title', 'Thread Title', array('class' => 'col-sm-2 control-label') ); }}
        <div class="col-sm-3">
          {{ Form::text('title', '', array('class' => 'form-control') )  }}
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('post_content', 'Thread Content', array('class' => 'col-sm-2 control-label') ); }}
        <div class="col-sm-6">
          {{ Form::textarea('post_content', '', array('class' => 'redactor_content') )  }}
        </div>
      </div>
              
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          {{ Form::submit( 'Create Thread', array('class' => 'btn btn-default') ) }}
        </div>
      </div>             
                           
      {{ Form::close() }}
            

    </div>

  </div> {{-- Row END--}}

</div>{{-- .container END --}}
@stop