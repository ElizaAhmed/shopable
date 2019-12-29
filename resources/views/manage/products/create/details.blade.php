@extends('layouts.admin')

@section('content')

<h2 class="mt-3 mb-3">Add Product</h2>

<div class="row">
    <div class="col-md-10">

        <div class="progress" style="height: 35px; margin-bottom: 10px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Product Details</div>
            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Product Images</div>
            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Product Variants</div>
            <div class="progress-bar bg-info" style="width: 25%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">Availability</div>
        </div>

        <div class="card mb-5">

        <form method="POST" action="{{url('/manage/products/details')}}">
                    @csrf

        <div class="card-header">
                <h5 class="card-title">Product Details</h5>
                <h6 class="card-subtitle mb-2 text-muted">Please insert product details</h6>
            </div>



            <div class="card-body">
                <h5 class="card-title">Product</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <hr class="mt-0" />

              



                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>

                        <div class="col-md-6">
                            <select class="custom-select @error('type') is-invalid @enderror" name="type">
                                <option value=""> -- Please select -- </option>
                                @foreach(product_types() as $product_type)
                                <option value="{{$product_type['id']}}">{{$product_type['name']}}</option>
                                @endforeach
                            </select>

                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="vendor" class="col-md-4 col-form-label text-md-right">Vendor</label>

                        <div class="col-md-6">
                            <select class="custom-select" name="vendor">
                                <option value=""> -- Please select -- </option>
                                @foreach(product_vendors() as $product_vendor)
                                <option value="{{$product_vendor['id']}}">{{$product_vendor['name']}}</option>
                                @endforeach


                            </select>

                            @error('vendor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" />

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                        <div class="col-md-6">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="tags" class="col-md-4 col-form-label text-md-right">Tags</label>

                        <div class="col-md-6">
                            <textarea id="tags" class="form-control tags @error('tags') is-invalid @enderror" name="tags">{{ old('tags') }}</textarea>

                            @error('tags')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <h5 class="card-title">Pricing</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <hr class="mt-0" />

                    <div class="form-group row">
                        <label for="cost_price" class="col-md-4 col-form-label text-md-right">Cost Price</label>

                        <div class="col-md-6">
                            <input id="cost_price" type="text" class="form-control @error('cost_price') is-invalid @enderror" name="cost_price" value="{{ old('cost_price') }}" />

                            @error('cost_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" />

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sale_price" class="col-md-4 col-form-label text-md-right">Sale Price</label>

                        <div class="col-md-6">
                            <input id="sale_price" type="text" class="form-control @error('sale_price') is-invalid @enderror" name="sale_price" value="{{ old('sale_price') }}" />

                            @error('sale_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="charge_tax" class="col-md-4 col-form-label text-md-right">Charge Tax?</label>

                        <div class="col-md-6">
                            <select class="custom-select" name="charge_tax">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>

                            @error('charge_tax')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <h5 class="card-title">Inventory</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <hr class="mt-0" />

                    <div class="form-group row">
                        <label for="sku" class="col-md-4 col-form-label text-md-right">SKU (Stock Keeping Unit)</label>

                        <div class="col-md-6">
                            <input id="sku" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ old('sku') }}" />

                            @error('sku')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="barcode" class="col-md-4 col-form-label text-md-right">Barcode</label>

                        <div class="col-md-6">
                            <input id="barcode" type="text" class="form-control @error('barcode') is-invalid @enderror" name="barcode" value="{{ old('barcode') }}" />

                            @error('barcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantity</label>

                        <div class="col-md-6">
                            <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" />

                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="track_inventory" class="col-md-4 col-form-label text-md-right">Track Inventory</label>

                        <div class="col-md-6">
                            <select class="custom-select" name="track_inventory">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>

                            @error('track_inventory')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <h5 class="card-title">Shipping</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <hr class="mt-0" />

                    <div class="form-group row">
                        <label for="shipping_required" class="col-md-4 col-form-label text-md-right">Shipping Required?</label>

                        <div class="col-md-6">

                            <select class="custom-select" name="shipping_required">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>

                            @error('shipping_required')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="weight" class="col-md-4 col-form-label text-md-right">Weight</label>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" name="weight" class="form-control @error('weight') is-invalid @enderror" aria-label="Weight" aria-describedby="basic-addon2" value="{{ old('weight') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">kg</span>
                                </div>
                            </div>

                            @error('weight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>



                    <h5 class="card-title">SEO</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <hr class="mt-0" />

                    <div class="form-group row">
                        <label for="page_title" class="col-md-4 col-form-label text-md-right">Page Title</label>

                        <div class="col-md-6">
                            <input id="page_title" type="text" class="form-control @error('page_title') is-invalid @enderror" name="page_title" value="{{ old('page_title') }}" />

                            @error('page_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="meta_description" class="col-md-4 col-form-label text-md-right">Meta Description</label>

                        <div class="col-md-6">
                            <textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description">{{ old('meta_description') }}</textarea>

                            @error('meta_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>




                   


                
                
            </div>

            <div class="card-footer">

            <button type="submit" class="btn btn-outline-primary">
                        Save product details
                    </button>
            </div>

            </form>
        </div>
    </div>
</div>

@endsection