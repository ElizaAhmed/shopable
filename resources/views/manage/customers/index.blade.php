@extends('layouts.admin')

@section('content')

<h3 class="mt-3 mb-3">All Customers</h3>

<table class="table table-sm table-bordered table-striped">
<thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">No of Order(s)</th>
    </tr>
  </thead>
  <tbody>
      @foreach($customers as $customer)
    <tr>
      <th scope="row">{{$customer->id}}</th>
      <td><a href="{{url('/admin/customers/'.$customer->id)}}">{{$customer->first_name}} {{$customer->last_name}}</a></td>
      <td>{{$customer->email}}</td>
      <td>23</td>
    </tr>
    @endforeach 
  </tbody>
</table>

{{ $customers->links() }}

@endsection