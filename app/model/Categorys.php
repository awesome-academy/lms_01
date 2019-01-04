<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "categorys";

    public function books()
    {
    	return $this->hasMany('Books::class');
    }
}
