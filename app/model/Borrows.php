<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Borrows extends Model
{
    protected $table = "borrows";

    public function borrow_books()
    {
    	return this->hasMany('Borrow_Book::classs');
    }
    public function user()
    {
    	return this->belongsTo('User::class');
    }
}
