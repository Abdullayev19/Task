<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Rental;

class AdminController extends Controller
{
    public function index()
    {
        $topBooks = Book::orderByDesc('times_rented')->take(5)->get();
        $authorsStats = Author::withCount('books')->get();
        $rentalsCount = Rental::whereNull('returned')->count();

        return view('admin.dashboard', compact('topBooks', 'authorsStats', 'rentalsCount'));
    }
}
