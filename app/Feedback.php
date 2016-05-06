<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $table = 'feedbacks';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['name', 'email', 'subject', 'body'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-M-Y H:i');
    }
}
