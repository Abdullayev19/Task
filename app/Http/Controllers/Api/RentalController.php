<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rental;
use App\Models\Author;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author')->where('available_copies', '>', 0)->get(['id', 'title', 'available_copies', 'author_id']);

        $books = $books->map(function ($book) {
            return [
                'id' => $book->id,
                'author_name' => $book->author->fullName,
                'title' => $book->title,
                'available_copies' => $book->available_copies,
            ];
        });

        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'start' => 'required|date',
            'finish' => 'required|date|after_or_equal:start',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->available_copies < 1) {
            return response()->json(['error' => 'Bu kitob mavjud emas!'], 400);
        }

        $rental = Rental::create($request->all());

        $book->decrement('available_copies');
        $book->increment('times_rented');

        $rentalData = [
            'id' => $rental->id,
            'book_name' => $book->title,
            'name' => $rental->name,
            'phone' => $rental->phone,
            'start' => $rental->start,
            'finish' => $rental->finish,
        ];

        return response()->json([
            'success' => 'Kitob ijaraga berildi!',
            'rental' => $rentalData,
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
