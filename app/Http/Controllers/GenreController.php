<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $itemsPerPage = $request->page_size ?? 20;
        $genres = Genre::paginate($itemsPerPage);

        return GenreResource::collection($genres);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "string|required"
        ]);

        $genre = Genre::create($validated);

        return new GenreResource($genre);
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return new GenreResource($genre);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'name' => 'string'
        ]);

        $genre->update($validated);

        return new GenreResource($genre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return response()->json([
            "message" => "Author data is marked for deletion.",
            "data" => new GenreResource($genre)
        ]);
    }

    public function restore(int $id)
    {
        $genre = Genre::restore($id);

        return response()->json([
            "message" => "Author data is restored.",
            "data" => new GenreResource($genre)
        ]);
    }
}
