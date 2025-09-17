<?php

namespace App\Http\Controllers\admin;

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
        $rentals = Rental::with('book.author')->get();
        return view('admin.rental.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'book_id' => 'required|exists:books,id',
            'start' => 'required|date',
            'finish' => 'required|date|after_or_equal:start',
        ]);

        $rental = Rental::create($request->all());

        $book = $rental->book;
        $book->decrement('available_copies');
        $book->increment('times_rented');

        return redirect('/')->with('success', 'Kitob ijaraga berildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rental = Rental::findOrFail($id);

        if ($request->has('returned') && !$rental->returned) {
            $rental->returned = $request->returned;
            $rental->save();
            $rental->book->increment('available_copies');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
