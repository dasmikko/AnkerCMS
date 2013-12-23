@extends('admin.default')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <h1>Blog</h1>
    <p>List of current blog posts</p>
  </div>
</div>

<div class="container"> 

  <div class="row">
    <div class="col-md-12">
      @if(Session::has('success'))    
              <h2><span class="label label-success">{{ Session::get('success') }}</span></h2><br>
      @endif
      <a href="/admin/blogs/edit/" class="btn btn-primary">Add blog post</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Action</th>
          </tr>
        </thead>
        @foreach ($blogs as $innerArray)
          <tr>
            <td>{{ $innerArray->id }}</td>
            <td>{{ $innerArray->title }}</td>
            <td>
              @if ($innerArray->slug === "")
                /
              @else
                /{{ $innerArray->slug }}
              @endif
            </td>
            <td>
              <a href="/admin/blogs/edit/{{ $innerArray->id }}" class="btn btn-default">Edit</a>
              <a href="/admin/blogs/delete/{{ $innerArray->id }}" title="Do want to delete this blog post: {{ $innerArray->title }}?" class="btn btn-danger showDelete">Delete</a> 
            </td>
          </tr>
        @endforeach
      </table>
      <a href="/admin/pages/edit/" class="btn btn-primary">Add blog post</a>
    </div>

  </div> {{-- Row END--}}

</div>{{-- .container END --}}

<script type="text/javascript">
  //This makes you confirm for page delete
  $(function() {
    $('.showDelete').click(function(e) {
      var title = $(this).attr( 'title' );
      if (!confirm(title)){
        return false;
      }
    });
  });
</script>
@stop {{-- Content end --}}