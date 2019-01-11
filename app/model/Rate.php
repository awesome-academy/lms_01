<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = "rates";

    public function user()
    {
    	return this->belongsTo('User::class');
    }

    public function book()
    {
    	return this->belongsTo('Books::class');
    }

    public function comment()
    {
    	return this->belongsTo('Comments::class');
    }
}
