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
            'price' => 'required|numeric',
            'promotion_price' => 'required|numeric',
            'amount' => 'numeric',
            'status' => 'required|numeric',
            'manufacturer' => 'max:255',
            'thumbnail => mimes:jpeg,jpg,png,gif|size:1024',
        ];
    }
}
