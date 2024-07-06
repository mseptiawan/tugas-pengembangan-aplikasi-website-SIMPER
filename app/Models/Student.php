<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }
    public function borrowedBooks()
    {
        return $this->belongsToMany(Book::class, 'borrowings', 'students_id', 'books_id')
            ->withPivot('borrowed_at', 'returned_at');
    }
}
