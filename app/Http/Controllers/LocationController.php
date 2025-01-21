<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $itemsPerPage = $request->page_size ?? 5;
        $locations = Location::with('parent')->paginate($itemsPerPage);

        return LocationResource::collection($locations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required',
            'description' => 'string|nullable'
        ]);

        $location = Location::create($validated);

        return new LocationResource($location);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        $locationData = Location::with('parent')->find($location->id);

        return new LocationResource($locationData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $validated = $request->validate([
            'name' => 'string',
            'description' => 'string|nullable',
            'parent_id' => 'int|exists:locations|nullable'
        ]);

        $location->update($validated);

        return new LocationResource($location);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return response()->json([
            "message" => "Location data is marked for deletion.",
            "data" => new LocationResource($location)
        ]);
    }

    public function restore(int $id)
    {
        $location = Location::restore($id);

        return response()->json([
            "message" => "Location data is restored",
            "data" => new LocationResource($location)
        ]);
    }
}
