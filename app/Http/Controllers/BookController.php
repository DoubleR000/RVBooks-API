<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
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

        if ($request->has("genre")) {
            $query->filterByGenre($request->input("genre"));
        }

        if ($request->has("author")) {
            // $query->filter
        }

        if ($request->has("search")) {
            $query->searchTitle($request->input("search"));
        }



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
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
