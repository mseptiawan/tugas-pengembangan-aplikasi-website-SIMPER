<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function shelfs()
    {
        return $this->belongsTo(Shelf::class,);
    }
    public function phone()
    {
        return $this->belongsTo(Student::class);
    }
    public function borrowers()
    {
        return $this->belongsToMany(Student::class, 'borrowings', 'books_id', 'students_id')
            ->withPivot('borrowed_at', 'returned_at');
    }
}
