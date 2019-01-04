<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $table = "likes";

    public function user()
    {
    	return this->belongsTo('User::class');
    }

    public function book()
    {
    	return this->belongsTo('Books::class');
    }
}
