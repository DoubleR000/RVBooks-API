<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use App\Http\Resources\TitleResource;
use App\Http\Services\TitleService;
use App\Models\Author;
use App\Models\Title;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $itemsPerPage = $request->page_size ?? 20;
        $titles = Title::with('authors')->paginate($itemsPerPage);

        return TitleResource::collection($titles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTitleRequest $request, TitleService $titleService)
    {
        $validated = $request->validated();

        $title = $titleService->createTitleWithAuthor($validated);

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

        $titleService->updateTitleWithAuthor($title, $validated);

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

    public function restore(int $id)
    {
        $title = Title::restore($id);

        return response()->json([
            "message" => "Title data is restored.",
            "data" => TitleResource::make($title)
        ]);
    }
}
