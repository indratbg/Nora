<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='categories';
    protected $fillable = ['category_id1','category_id2','category_id3','category_name'];
    protected $dates = ['created_at','updated_at'];
}
