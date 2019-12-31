@extends('layouts.admin')

@section('content')

<h2 class="mt-3 mb-3">Add Product</h2>

<div class="row">
    <div class="col-md-10">

        <div class="progress" style="height: 35px; margin-bottom: 10px;">
            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25">Product Details</div>
            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Product Images</div>
            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25">Product Variants</div>
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25">Availability</div>
        </div>

        <div class="card">
            <form method="POST" action="{{url('/manage/products/'.$product_id.'/availability')}}">
                @csrf
                <div class="card-header">
                    <h5 class="card-title">Product Availability</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Product availability</h6>
                </div>
                <div class="card-body">

                <div class="form-group row">
                        <label for="available" class="col-md-4 col-form-label text-md-right">Available</label>
                        <div class="col-md-6">
                            <select class="custom-select @error('available') is-invalid @enderror" name="available">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>

                            @error('available')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="available_date" class="col-md-4 col-form-label text-md-right">Available after</label>
                        <div class="col-md-6">
                            <input id="available_date" type="text" class="form-control @error('available_date') is-invalid @enderror" name="available_date" value="{{ old('available_date') }}" />
                            @error('available_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>



                    
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary">
                        Save availability
                    </button>
                </div>
            </form>
        </div>

        @endsection