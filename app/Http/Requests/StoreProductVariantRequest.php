<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductVariantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

     //   print_r(FormRequest::all());

        //exit;


        return [
            //'variant_names' => 'required|array',
            //'variant_names.*' => 'required_with:variant_options.*',
           /// 'variant_options' => 'required|array',
           // 'variant_options.*' => 'required_with:variant_names.*',
           // 'variants' => 'required|array|min:1',
            'variants_0_name' => 'required',
            'variants_1_name' => 'required',
            'variants_2_name' => 'required',
            'variants_3_name' => 'required',
            'variants_4_name' => 'required',
            'variants_5_name' => 'required',
            'variants_6_name' => 'required',
            'variants_7_name' => 'required',
            'variants_8_name' => 'required',
            'variants_9_name' => 'required',
            'variants_10_name' => 'required',
            'variants_11_price' => 'required',
            'variants_12_price' => 'required',
            'variants_13_price' => 'required',
             'variants_14_price' => 'required',
            // 'variants_15_price' => 'required',
            // 'variants_16_price' => 'required',
            // 'variants_17_price' => 'required',
            // 'variants_18_price' => 'required',
            // 'variants_19_price' => 'required',
            // 'variants_20_price' => 'required',


            // 'variants.*.sku' => 'required_without:variants.*.barcode',
            // 'variants.*.barcode' => 'required_without:variants.*.sku',
            // 'variants.*.price' => 'required|numeric',
            // 'variants.*.quantity' => 'required|numeric',
           
        ];
    }
}
