<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'title',
        'description',
        'total_copies',
        'available_copies',
        'times_rented',
    ];

    // (many-to-one)

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // (one-to-many)

    // public function rentals()
    // {
    //     return $this->hasMany(Rental::class);
    // }
}
