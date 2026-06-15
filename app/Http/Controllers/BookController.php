<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
 public function index(Request $request)
{
    $query = Book::query();

    if ($request->title) {
        $query->where('title', 'like', '%' . $request->title . '%');
    }

    return response()->json(
        $query->with('user')->paginate(10)
    );
}

  public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'price' => 'required|numeric',
        'isbn' => 'required|unique:books',
        'publishedDate' => 'required|date',
    ]);

    $book = Book::create($request->all());

   return response()->json([
    'message' => 'Book created successfully',
    'data' => $book
], 201);
}

 public function update(Request $request, $id)
{
    $book = Book::find($id);

    if (!$book) {
        return response()->json(['message' => 'Book not found'], 404);
    }

    $book->update($request->all());

    return response()->json([
        'message' => 'Book updated successfully',
        'data' => $book
    ]);
}

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully'
        ]);
    }
    public function search(Request $request)
{
    $query = Book::query();

    if ($request->title) {
        $query->where('title', 'like', '%' . $request->title . '%');
    }

    return $query->get();
}
public function show($id)
{
    $book = Book::find($id);

    if (!$book) {
        return response()->json(['message' => 'Book not found'], 404);
    }

    return response()->json([
        'data' => $book
    ]);
}
}
