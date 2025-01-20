<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use App\Http\Resources\TitleResource;
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
        $titles = Title::paginate($itemsPerPage);

        return TitleResource::collection($titles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTitleRequest $request)
    {
        $data = $request->validated();

        $title = Title::create($data);

        return new TitleResource($title);
    }

    /**
     * Display the specified resource.
     */
    public function show(Title $title)
    {
        return new TitleResource($title);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTitleRequest $request, Title $title)
    {
        $data = $request->validated();

        $title->update($data);

        return new TitleResource($title);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Title $title)
    {
        $title->delete();

        return response()->json([
            "message" => "Title data is marked for deletion."
        ]);
    }
}
