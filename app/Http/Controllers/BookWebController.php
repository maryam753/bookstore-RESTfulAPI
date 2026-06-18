<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookWebController extends Controller
{
  public function index(Request $request)
{
    $query = Book::query();

    if ($request->search) {
        $query->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('author', 'like', '%' . $request->search . '%');
    }

    $books = $query->latest()->paginate(9);
    return view('books.index', compact('books'));
}

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'author'        => 'required|string|max:255',
            'price'         => 'required|numeric|min:0',
            'isbn'          => 'required|unique:books,isbn',
            'publishedDate' => 'required|date',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'author'        => 'required|string|max:255',
            'price'         => 'required|numeric|min:0',
            'publishedDate' => 'required|date',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}