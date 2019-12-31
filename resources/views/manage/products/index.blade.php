@extends('layouts.admin')

@section('content')

<h2 class="mt-3 mb-3 float-left">Products</h2>

<a href="{{url('manage/products/details/create')}}" class="btn btn-outline-primary">Add Product</a>



<table class="table table-sm table-bordered table-striped">
<thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Type</th>
      <th scope="col">Name</th>
      <th scope="col">No of Order(s)</th>
    </tr>
  </thead>
  <tbody>
      @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->type_id}}</td>
      <td><a href="{{url('/manage/products/'.$product->id)}}">{{$product->title}}</a></td>
      <td>23</td>
    </tr>
    @endforeach 
  </tbody>
</table>

{{ $products->links() }}



@endsection