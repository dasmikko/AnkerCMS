@extends('admin.default')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->


	<div class="row">
		<div class="large-12 columns">
			<h1>{{ $header }}</h1>
		</div>
	</div>

			{{ Form::open(array('url' => $url, 'class' => 'form-horizontal')) }}

			<div class="row">
				<div class="large-4 columns">
					{{ Form::label('title', 'Title', array('class' => 'col-sm-2 control-label') ); }}
					{{ Form::text('title', $title, array('class' => 'form-control') )  }}
				</div>
			</div>

			<div class="row">
				<div class="large-4 columns">
					{{ Form::label('page_title', 'Page title', array('class' => 'col-sm-2 control-label') ); }}
					{{ Form::text('page_title', $page_title, array('class' => 'form-control') )  }}
				</div>
			</div>

			<div class="row">
				<div class="large-4 columns">
					{{ Form::label('slug', 'Slug', array('class' => 'col-sm-2 control-label') ); }}
					{{ Form::text('slug', $slug, array('class' => 'form-control') )  }}
				</div>
			</div>

			<div class="row">
				<div class="large-12 columns">
					{{ Form::label('description', 'Description', array('class' => 'col-sm-2 control-label') ); }}
					{{ Form::textarea('description', $description, array('class' => 'form-control redactor_content') )  }}
				</div>
			</div>

			<div class="row">
				<div class="large-12 columns">
				</div>
			</div>

			<div class="row">
				<div class="large-4 columns">
					{{ Form::submit( 'Save', array('class' => 'button') ) }}
					{{ link_to_route('AdminShowPages', 'Cancel', $parameters = array(), $attributes = array('class' => 'button secondary')) }}
				</div>
			</div>
		 
			{{ Form::close() }}
		</div>

	</div> {{-- Row END--}}


@stop {{-- Content end --}}