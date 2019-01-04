<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = "books";

    public function category()
    {
    	return this->belongsTo('Categorys::class');
    }

    public function publisher()
    {
    	return this->belongsTo('Publisher::class');
    }

    public function author()
    {
    	return this->belongsTo('Authors::class');
    }

    public function book_borrows()
    {
    	return this->hasMany('Borrow_Book::class');
    }

    public function comments()
    {
    	return this->hasMany('Comments::class');
    }

    public function rates()
    {
    	return this->hasMany('Rate::class');
    }

    public function likes()
    {
    	return this->hasMany('Like::class');
    }

}
