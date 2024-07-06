<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;


    public function books()
    {
        return $this->belongsToMany(Book::class, 'borrowings', 'students_id', 'books_id');
    }
}
