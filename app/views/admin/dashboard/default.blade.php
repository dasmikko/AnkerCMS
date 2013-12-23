@extends('admin.default')

@section('content')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <h1>Dashboard</h1>
    <p>Welcome back {{ Auth::user()->username }}!</p>
  </div>
</div>

<div class="container"> 

  <div class="row">
    <div class="col-md-4">
      <h2>Stats</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>Visitors</th>
            <th>Unique visitors</th>
          </tr>
        </thead>
        <tr>
          <td>Today</td>
          <td>None</td>
          <td>None</td>
        </tr>
      </table>
    </div>
    <div class="col-md-4">
      <h2>Log</h2>
      <p>Nothing logged yet!</p>
   </div>
    <div class="col-md-4">
      <h2>Errors</h2>
      <p>Yay! No errors. :)</p>
    </div>
  </div>

</div>{{-- .container END --}}
@stop {{-- Content end --}}