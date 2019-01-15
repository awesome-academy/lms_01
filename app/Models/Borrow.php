<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = "borrows";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'day_borrow',
        'end_day_borrow',
        'quantity',
        'status',
    ];

    public function borrow_books()
    {
        return $this->hasMany('Borrow_Book::classs');
    }

    public function user()
    {
        return $this->belongsTo('User::class');
    }
}
