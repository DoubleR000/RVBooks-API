<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
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
    public function store(StoreLocationRequest $request)
    {
        $validated = $request->validated();

        $location = Location::create($validated);

        return new LocationResource($location);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        $location->load('parent');

        return new LocationResource($location);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $validated = $request->validated();

        $location->update($validated);

        return new LocationResource($location);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return response()->noContent();
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
