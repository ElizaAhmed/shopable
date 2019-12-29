@extends('layouts.admin')

@section('content')

<h2 class="mt-3 mb-3">Add Product</h2>




<div class="row">
    <div class="col-md-10">


    <div class="progress" style="height: 35px; margin-bottom: 10px;">
            <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Product Details</div>
            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Product Images</div>
            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Product Variants</div>
        
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 25%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">Availability</div>

        
        </div>

        <div class="card">


        

  
        <h5 class="card-title">Shipping</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <hr class="mt-0" />




        

                <form method="POST" action="/manage/products">
                    @csrf

                    

                   

                

                    
                 




                   

                 

                 


                    

                    <div class="form-group row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantity</label>

                        <div class="col-md-6">
                            <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}"/>

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


            

             






                    <hr />


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-outline-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection