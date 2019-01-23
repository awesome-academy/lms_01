<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = "follows";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'book_id',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo('User::class');
    }

    public function book()
    {
        return $this->belongsTo('Book::class');
    }
}
