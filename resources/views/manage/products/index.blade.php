@extends('layouts.admin')

@section('content')

<h2 class="mt-3 mb-3">Products</h2>

<a href="{{url('manage/products/details/create')}}" class="btn btn-outline-primary">Add Product</a>

@endsection