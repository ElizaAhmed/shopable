@extends('layouts.admin')

@section('content')

<h2 class="mt-3 mb-3">All users</h2>

<table class="table table-sm table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">No of Order(s)</th>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->first_name}}</td>
      <td>{{$user->last_name}}</td>
      <td>{{$user->email}}</td>
      <td>23</td>
    </tr>
    @endforeach 
    
  </tbody>
</table>

{{ $users->links() }}

@endsection