<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    public $incrementing = false;
    protected $fillable = ['id_product,product_name,category,description,stock, price,
                            discount_perc,new_price,post_date_from,post_date_to,status'];
    protected $dates = ['post_date_from', 'post_date_to'];

    public function setPostDateFromAttribute($value)
    {
        $this->attributes['post_date_from'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function setPostDateToAttribute($value)
    {
        $this->attributes['post_date_to'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getPostDateFromAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getPostDateToAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }

}

