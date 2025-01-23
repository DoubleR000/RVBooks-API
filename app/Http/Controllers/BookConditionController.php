<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookConditionResource;
use App\Models\BookCondition;
use Illuminate\Http\Request;

class BookConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookConditions = BookCondition::all();

        return BookConditionResource::collection($bookConditions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "string|required|unique:book_conditions",
            "description" => "string|nullable"
        ]);

        $bookCondition = BookCondition::create($validated);

        return BookConditionResource::make($bookCondition);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookCondition $bookCondition)
    {
        return BookConditionResource::make($bookCondition);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookCondition $bookCondition)
    {
        $validated = $request->validate([
            "name" => "string|unique:book_conditions",
            "description" => "string|nullable"
        ]);

        $bookCondition->update($validated);

        return BookConditionResource::make($bookCondition);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCondition $bookCondition)
    {
        $bookCondition->delete();

        return response()->json([
            "message" => "Book Condition data is marked for deletion.",
            "data" => BookConditionResource::make($bookCondition)
        ]);
    }

    public function restore(int $id)
    {
        $bookCondition = BookCondition::restore($id);

        return response()->json([
            "message" => "Book Condition data is restored.",
            "data" => BookConditionResource::make($bookCondition)
        ]);
    }
}
