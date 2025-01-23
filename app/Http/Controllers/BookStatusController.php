<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookStatusResource;
use App\Models\BookStatus;
use Illuminate\Http\Request;

class BookStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookStatuses = BookStatus::all();

        return BookStatusResource::collection($bookStatuses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|unique:book_statuses',
            'description' => 'string|nullable'
        ]);

        $bookStatus = BookStatus::create($validated);

        return BookStatusResource::make($bookStatus);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookStatus $bookStatus)
    {
        return BookStatusResource::make($bookStatus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookStatus $bookStatus)
    {
        $validated = $request->validate([
            'name' => 'string|unique:book_statuses',
            'description' => 'string|nullable'
        ]);

        $bookStatus->update($validated);

        return BookStatusResource::make($bookStatus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookStatus $bookStatus)
    {
        $bookStatus->delete();

        return response()->noContent();
    }

    public function restore(int $id)
    {
        $bookStatus = BookStatus::restore($id);

        return response()->json([
            'message' => 'Book Status data is restored',
            'data' => BookStatusResource::make($bookStatus)
        ]);
    }
}
