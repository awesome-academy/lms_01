<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = "follows";

    public function user()
    {
    	return this->belongsTo('User::class');
    }

    public function book()
    {
    	return this->belongsTo('Books::class');
    }
    public function author()
    {
    	return this->belongsTo('Authors::class');
    }
}
