<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use App\Http\Resources\TitleResource;
use App\Services\TitleService;
use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Title::query();

        if ($request->has('genre')) {
            $query->filterByGenre($request->input('genre'));
        }

        if ($request->has('author')) {
            $query->filterByAuthor($request->input('author'));
        }

        if ($request->has('year')) {
            $query->filterByYear($request->input('year'));
        }

        $itemsPerPage = $request->page_size ?? 20;
        $titles = $query->with(['authors', 'genres'])->paginate($itemsPerPage);

        return TitleResource::collection($titles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTitleRequest $request, TitleService $titleService)
    {
        $validated = $request->validated();

        $title = $titleService->createTitle($validated);

        return TitleResource::make($title);
    }

    /**
     * Display the specified resource.
     */
    public function show(Title $title)
    {
        return TitleResource::make($title);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTitleRequest $request, Title $title, TitleService $titleService)
    {
        $validated = $request->validated();

        $titleService->updateTitle($title, $validated);

        return TitleResource::make($title);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Title $title)
    {
        $title->delete();

        return response()->noContent();
    }

    public function restore(Title $title)
    {

        $title->restore();

        return response()->json([
            "message" => "Title data is restored.",
            "data" => TitleResource::make($title)
        ]);
    }

    public function updateSlug(Request $request, Title $title)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:titles,slug'
        ]);

        $title->update($validated);

        return TitleResource::make($title);
    }
}
