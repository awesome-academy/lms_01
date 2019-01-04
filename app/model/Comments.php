<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = "comments";

    public function rates()
    {
    	return this->hasMany('Rate::class');
    }

    public function user()
    {
    	return this->belongsTo('User::class');
    }
    
    public function book()
    {
    	return this->belongsTo('Books::class');
    }
}
