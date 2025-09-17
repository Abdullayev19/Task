<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Book;

class PageController extends Controller
{
    public function index()
    {
        $books = Book::where('available_copies', '>', 0)->get();
        return view('welcome', compact('books'));
    }
}
