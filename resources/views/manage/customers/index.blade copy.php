@extends('layouts.manage')

@section('content')

<div class="d-block mt-3">
    <h2 class="float-left">Products</h2>
    <div class="float-right">
        <a href="{{url('manage/products/details/create')}}" class="btn btn-sm btn-outline-primary">Add Product</a>
    </div>
</div>

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