<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        $query->when($request->input("genre"))
            ->filterByGenre($request->input("genre"));

        $query->when($request->input("author"))
            ->filterByAuthor($request->input("author"));

        $query->when($request->input("search"))
            ->search($request->input("search"));

        $itemsPerPage = $request->page_size ?? 20;
        $books = $query->with([
            'title',
            'title.genres',
            'title.authors',
            'location',
            'status',
            'condition'
        ])->paginate($itemsPerPage);

        return BookResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        $book = Book::create($validated);

        return BookResource::make($book);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return BookResource::make($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->validated();

        $book->update($validated);

        return BookResource::make($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->noContent();
    }

    public function restore(Book $book)
    {
        $book->restore();

        return response()->json([
            "message" => "Title data is restored.",
            "data" => BookResource::make($book)
        ]);
    }
}
