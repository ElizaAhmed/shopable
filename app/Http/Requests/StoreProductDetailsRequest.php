<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductDetailsRequest extends FormRequest
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
            'type' => 'required',
            'vendor' => '',
            'title' => 'required',
            'description' => 'required',
            'tags' => '',
            'cost_price' => 'required|numeric',
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'charge_tax' => 'required',
            'sku' => 'required_without:barcode',
            'barcode' => 'required_without:sku',
            'quantity' => 'required|numeric',
            'track_inventory' => 'required',
            'shipping_required' => 'required',
            'weight' => 'required|numeric|max:40',
            'page_title' => '', // 'nullable|between:50,68',
            'meta_description' => '', // 'nullable|between:50,160',
        ];
    }
}
