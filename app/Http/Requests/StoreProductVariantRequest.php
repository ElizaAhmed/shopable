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

        return [
            'variant_names' => 'required|array',
            'variant_names.*' => 'required_with:variant_options.*',
            'variant_options' => 'required|array',
            'variant_options.*' => 'required_with:variant_names.*',
            'variants' => 'required|array|min:1',
            'variants.*.name' => 'required',
            'variants.*.sku' => 'required_without:variants.*.barcode',
            'variants.*.barcode' => 'required_without:variants.*.sku',
            'variants.*.price' => 'required|numeric',
            'variants.*.quantity' => 'required|numeric',

        ];
    }
}
