<?php

namespace App\Http\Requests;

//use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'product_name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'price' => 'required|integer',
            'post_date_from' => 'date_format:d/m/Y|after:today',
            'post_date_to' => 'date_format:d/m/Y|after:post_date_from',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return ['post_date_from.required' => 'From Date is required',
            'post_date_to.required' => 'To Date is required',
            'product_name.required' => 'Product Name is required',];
    }
}
