@extends('default')

@section('content')
<div class="row"> 

    <div class="large-12 columns">
      <h1>Blog!</h1>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th width="800">Title</th>
            <th></th>
          </tr>
        </thead>
        @foreach ($blogs as $innerArray)
          <tr>
            <td>{{ $innerArray->id }}</td>
            <td>{{ $innerArray->title }}</td>
            <td>
              <a href="/blog/{{ $innerArray->title }}" class="button tiny">Read More</a>
            </td>
          </tr>
        @endforeach
      </table>

  </div> {{-- Row END--}}

</div>{{-- .container END --}}
@stop