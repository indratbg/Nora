<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table = 'blogs';

    public static $rules=  ['title' => 'required|min:10',
        'body' => 'required|min:20',
        'category' => 'required'];
    // Carbon instance fields
    protected $dates = ['created_at', 'updated_at'];

}
