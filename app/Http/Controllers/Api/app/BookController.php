<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // List all books
    public function index()
    {
        return Book::all();
    }

    // Store a new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
        ]);
        $book = Book::create($validated);
        return response()->json($book, 201);
    }

    // Show a single book (optional)
    public function show($id)
    {
        return Book::findOrFail($id);
    }

    // Update a book
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
        ]);
        $book = Book::findOrFail($id);
        $book->update($validated);
        return response()->json($book);
    }

    // Delete a book
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(null, 204);
    }
}