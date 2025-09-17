<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'book_id',
        'start',
        'finish',
        'returned',
    ];


    public function book()
    {
        return $this->belongsTo(Book::class);
    }


    public function isReturned(): bool
    {
        return $this->returned !== null;
    }


    public function isOverdue(): bool
    {
        return !$this->isReturned() && now()->greaterThan($this->finish);
    }
}
