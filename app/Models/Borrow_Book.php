<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow_Book extends Model
{
    protected $table = "borrow_book";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        'borrow_id',
        'book_id',
        'quantity',
    ];

    public function borrow()
    {
        return $this->belongsTo('Borrow::class');
    }

    public function book()
    {
        return $this->belongsTo('Book::class');
    }
}
