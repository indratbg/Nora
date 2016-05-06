<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table = 'blogs';

    // Carbon instance fields
    protected $dates = ['post_at', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'subtitle', 'category', 'body', 'status', 'post_at'];

    public function setPostAtAttribute($value)
    {
        $this->attributes['post_at'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getPostAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
