<?php

namespace App\Http\Requests;

//use App\Http\Requests\Request;
//use Illuminate\Support\Facades\Validator;

class CategoryRequest extends Request
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
            'category_id1'=>'required|max:10',
            'category_id2'=>'required|max:10',
            'category_name'=>'required|max:30',
        ];
    }
    public function messages()
    {
        return [
            'category_id1.required' => 'Parameter 1 is required',
            'category_id2.required' => 'Parameter 2 is required',
            'category_name.required' => 'Category Name is required',
        ];
    }
}
