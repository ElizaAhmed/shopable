@extends('layouts.manage')

@section('content')

<h2 class="mt-3 mb-3">Add Product</h2>

<div class="row">
    <div class="col-md-10">

        <div class="progress" style="height: 35px; margin-bottom: 10px;">
            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25">Product Details</div>
            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Product Images</div>
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25">Product Variants</div>
            <div class="progress-bar bg-info" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25">Availability</div>
        </div>

        <div class="card">

            <form method="POST" action="{{url('/manage/products/'.$product_id.'/variants')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h5 class="card-title">Product Variants</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Create product variants</h6>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th width="25%">Name</th>
                                        <th width="75%">Values</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control @error('options.0.name') is-invalid @enderror" name="options[0][name]" value="{{old('options.0.name')}}" placeholder="i.e. Size"></td>
                                        <td><input type="text" class="form-control tags @error('options.0.options') is-invalid @enderror" name="options[0][options]" value="{{old('options.0.options')}}" placeholder="Type and press enter"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control @error('options.1.name') is-invalid @enderror" name="options[1][name]" value="{{old('options.1.name')}}" placeholder="i.e. Color"></td>
                                        <td><input type="text" class="form-control tags @error('options.1.options') is-invalid @enderror" name="options[1][options]" value="{{old('options.1.options')}}" placeholder="Type and press enter"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control @error('options.2.name') is-invalid @enderror" name="options[2][name]" value="{{old('options.2.name')}}" placeholder="i.e. Material"></td>
                                        <td><input type="text" class="form-control tags @error('options.2.options') is-invalid @enderror" name="options[2][options]" value="{{old('options.2.options')}}" placeholder="Type and press enter"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- variant table-->
                            <?php $variants = old('variants'); ?>
                            <table class="table table-sm table-bordered @if(isset($variants) && count($variants) > 0) d-block @else d-none @endif" id="variants-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="50%">Variant</th>
                                        <th width="15%">SKU</th>
                                        <th width="15%">Barcode</th>
                                        <th width="10%">Price</th>
                                        <th width="10%" colspan="2">Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($variants) && count($variants) > 0)
                                        @foreach($variants as $index => $variant)
                                            <tr id="variant-{{$index}}-item">
                                                <td><input type="text" class="form-control form-control-sm @error('variants.'.$index.'.name') is-invalid @enderror" name="variants[{{$index}}][name]" value="{{old('variants.'.$index.'.name')}}" readonly></td>
                                                <td><input type="text" class="form-control form-control-sm @error('variants.'.$index.'.sku') is-invalid @enderror" name="variants[{{$index}}][sku]" value="{{old('variants.'.$index.'.sku')}}"></td>
                                                <td><input type="text" class="form-control form-control-sm @error('variants.'.$index.'.barcode') is-invalid @enderror" name="variants[{{$index}}][barcode]" value="{{old('variants.'.$index.'.barcode')}}"></td>
                                                <td><input type="text" class="form-control form-control-sm text-right @error('variants.'.$index.'.price') is-invalid @enderror" name="variants[{{$index}}][price]" value="{{old('variants.'.$index.'.price')}}"></td>
                                                <td><input type="text" class="form-control form-control-sm text-right @error('variants.'.$index.'.quantity') is-invalid @enderror" name="variants[{{$index}}][quantity]" value="{{old('variants.'.$index.'.quantity')}}"></td>
                                                <td><span class="variant-button p-2" data-item="{{$index}}"><i class="fa fa-trash text-danger"></i></span></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary">
                        Save product variants
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection