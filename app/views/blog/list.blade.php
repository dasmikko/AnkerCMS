@extends('default')

@section('content')
<div class="container"> 

  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th></th>
          </tr>
        </thead>
        @foreach ($blogs as $innerArray)
          <tr>
            <td>{{ $innerArray->id }}</td>
            <td>{{ $innerArray->title }}</td>
            <td>
              @if ($innerArray->title === "")
                /
              @else
                /{{ $innerArray->title }}
              @endif
            </td>
            <td>
              <a href="/blog/{{ $innerArray->title }}" class="btn btn-default">Read More</a>
            </td>
          </tr>
        @endforeach
      </table>
    </div>

  </div> {{-- Row END--}}

</div>{{-- .container END --}}
@stop