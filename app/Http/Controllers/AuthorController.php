<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Author::class);

        $itemsPerPage = $request->page_size ?? 20;
        $authors = Author::paginate($itemsPerPage);

        return AuthorResource::collection($authors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Author::class);

        $validated = $request->validate([
            'name' => 'string|required|unique:authors'
        ]);

        $author = Author::create($validated);

        return AuthorResource::make($author);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        Gate::authorize('viewAny', Author::class);

        return AuthorResource::make($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        Gate::authorize('update', Author::class);

        $validated = $request->validate([
            'name' => 'string|unique:authors'
        ]);

        $author->update($validated);

        return AuthorResource::make($author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        Gate::authorize('delete', Author::class);

        $author->delete();

        return response()->noContent();
    }

    public function restore(int $id)
    {
        Gate::authorize('restore', Author::class);

        $author = Author::restore($id);

        return AuthorResource::make($author);
    }
}
