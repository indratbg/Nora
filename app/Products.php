<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = 'products';

    public static $rules=  ['product_name'=>'required',
				            'category'=>'required',
				            'description'=>'required',
				            'stock'=>'required',
				            'price'=>'required|integer',
				            'post_date_from'=>'required|date',
				            'post_date_to'=>'required',
				            'status'=>'required'
				            ];
}
