<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'sku' => 'required|unique:products,sku,' . $this->id . '|max:20',
            'name' => 'required|max:255',
            'slug' => 'required|unique:products,slug,' . $this->id . '|max:255',
            'price' => 'nullable|numeric',
            'cost' => 'nullable|numeric',
            'status' => 'required|numeric',
            'thumbnail' => 'nullable|mimes:jpeg,jpg,png,gif|size:1024',
            'stock' => 'nullable|numeric',
            'categories.*' => 'nullable|numeric',
            'supplier_id' => 'nullable|numeric',
            'brand_id' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'minimum' => 'nullable|numeric',
            'date_available' => 'nullable|date_format:Y-m-d',
        ];
    }
}
