<?php 


function product_types() {

        return \App\ProductType::where('active', 1)->get(['id','name'])->toArray();

}

function product_vendors() {

        return \App\ProductVendor::where('active', 1)->get(['id','name'])->toArray();

}
