<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $table = "authors";

    public function follows()
    {
    	return $this->hasMany('Follow::class');
    }
    public function books()
    {
    	return $this->hasMany('Books::class');
    }
}
