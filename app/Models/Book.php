<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    'title',
    'author',
    'price',
    'isbn',
    'publishedDate'
];
public function user()
{
    return $this->belongsTo(User::class);
}
}
