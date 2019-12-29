<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use App\Product;
use App\ProductImage;
use App\Http\Requests\StoreProductDetailsRequest;
use Image;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\StoreProductVariantRequest;

use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProductDetails()
    {
        return view('manage.products.create.details');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProductDetails(StoreProductDetailsRequest $request)
    {

        $product_details = array(
            'type_id' => $request->get('type'),
            'vendor_id' => $request->get('vendor'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'tags' => $request->get('tags'),

            'cost_price' => $request->get('cost_price'),
            'price' => $request->get('price'),
            'sale_price' => $request->get('sale_price'),
            'charge_tax' => $request->get('charge_tax'),

            'sku' => $request->get('sku'),
            'barcode' => $request->get('barcode'),
            'quantity' => $request->get('quantity'),
            'track_inventory' => $request->get('track_inventory'),

            'shipping_required' => $request->get('shipping_required'),
            'weight' => $request->get('weight'),
            'page_title' => $request->get('page_title'),
            'meta_description' => $request->get('meta_description'),
            'step_of_inventory' => 2
        );

        $product = Product::create($product_details);

        if ($product) {
            return redirect('/manage/products/' . $product->id . '/images/create')->with('success', 'Product details successfully stored.');
        }

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProductImages($product_id)
    {
        $product = Product::find($product_id);
        if(!$product || !$product->step_to_inventory < 2) {
            return redirect('/manage/products/details/create')->with('warning', 'Product details not found. Please create product.');
        }
        return view('manage.products.create.images', ['product_id' => $product_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProductImages(StoreProductImageRequest $request, $product_id)
    {

        $image = $request->file('image');

        // Normal image - main view 
        $normal = Image::make($image->path());
        $normal->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $normal_image = $normal->stream()->detach();

        // Normal image - list view 
        $small = Image::make($image->path());
        $small->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $small_image = $small->stream()->detach();

        // Normal image - thumbnail view 
        $thumbnail = Image::make($image->path());
        $thumbnail->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        });
        $thumbnail_image = $thumbnail->stream()->detach();

        $image_name = strtolower(str_replace(' ', '-', $image->getClientOriginalName()));

        Storage::disk('s3')->put('products/' . $product_id . '/normal/' . $image_name, $normal_image);
        Storage::disk('s3')->put('products/' . $product_id . '/small/' . $image_name, $small_image);
        Storage::disk('s3')->put('products/' . $product_id . '/thumbnail/' . $image_name, $thumbnail_image);

        $image_details = [
            'product_id' => $product_id,
            'image' => $image_name,
            'created_by' => Auth::user()->id
        ];

        $store_image = ProductImage::create($image_details);
        
        if($store_image) {
            Product::where('id', $product_id)->update(['step_of_inventory' => 3]);
            return redirect('/manage/products/'.$product_id.'/images/create')->with('success', 'Image successfully uploaded');
        }

        return redirect()->back()->with('error', 'Failed to store image. Please try again.');
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProductVariants($product_id)
    {
        return view('manage.products.create.variants', ['product_id' => $product_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function proceedToProductVariants(Request $request, $product_id)
    {
        $update_steps = Product::where('id', $product_id)->update(['step_of_inventory' => 3]);
        if($update_steps) {
            return redirect('/manage/products/'.$product_id.'/variants/create');
        }
        return redirect('/manage/products/'.$product_id.'/images/create')->with('error', 'Please store product images.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProductVariants(StoreProductVariantRequest $request, $product_id)
    {

        
        


        echo "<pre>";
        print_r($request->all());
        echo "</pre>";

       

      // return redirect()->back()->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProductAvailability($product_id)
    {
        return view('manage.products.create.availability', ['product_id' => $product_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProductAvailability(Request $request, $product_id)
    {

        $all = $request->file('');

        echo "<pre>";
        print_r($all);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function variants(Request $request)
    {
        $variants = $request->get('variants');

        $arrays = array();
        foreach ($variants as $variant) {
            $items = explode(',', $variant);
            if (count($items) > 0 && isset($items[0]) && $items[0] != '') {
                $arrays[] = $items;
            }
        }

        $mix_variants = $this->combinations((array) $arrays);
        return response()->json($mix_variants);
    }


    public function combinations($arrays, $i = 0)
    {
        if (!isset($arrays[$i])) {
            return array();
        }
        if ($i == count($arrays) - 1) {
            return $arrays[$i];
        }

        // get combinations from subsequent arrays
        $tmp = $this->combinations($arrays, $i + 1);

        $result = array();

        // concat each array from tmp with each element from $arrays[$i]
        foreach ($arrays[$i] as $v) {
            foreach ($tmp as $t) {
                $result[] = is_array($t) ?
                    array_merge(array($v), $t) : array($v, $t);
            }
        }

        return $result;
    }
}
