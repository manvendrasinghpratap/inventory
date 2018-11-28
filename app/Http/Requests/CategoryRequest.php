<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required',
            'product_id' => 'required',
            'rate' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Category Name is required',
            'product_id.required' => 'Product Name is required',
            'rate.required' => 'Rate of Product is required',
        ];
    }
}
