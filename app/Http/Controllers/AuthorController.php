<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $itemsPerPage = $request->page_size ?? 20;
        $authors = Author::paginate($itemsPerPage);

        return AuthorResource::collection($authors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|unique:authors'
        ]);

        $author = Author::create($validated);

        return new AuthorResource($author);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'string|unique:authors'
        ]);

        $author->update($validated);

        return new AuthorResource($author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return response()->noContent();
    }

    public function restore(int $id)
    {
        $author = Author::restore($id);

        return response()->json([
            "message" => "Author data is marked for deletion.",
            "data" => new AuthorResource($author)
        ]);
    }
}
