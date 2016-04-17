<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = 'products';
	protected $fillable = ['id_product,product_name,category,description,stock, price,post_date_from,post_date_to,status'];
    public static $rules=  ['product_name'=>'required',
				            'category'=>'required',
				            'description'=>'required',
				            'stock'=>'required',
				            'price'=>'required|integer',
				            'post_date_from'=>'required|date_format:d/m/Y',
				            'post_date_to'=>'required|date_format:d/m/Y',
				            'status'=>'required'
				            ];
}
