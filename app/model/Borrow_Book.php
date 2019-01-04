<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Borrow_Book extends Model
{
    protected $table = "borrow_book";

    public function borrow()
    {
    	return this->belongsTo('Borrows::class');
    }

    public function book()
    {
    	return this->belongsTo('Books::class');
    }
}
