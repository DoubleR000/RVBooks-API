<?php

namespace App\Http\Controllers;

use App\Http\Resources\RentalPeriodUnitResource;
use App\Models\RentalPeriodUnit;
use Illuminate\Http\Request;

class RentalPeriodUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periods = RentalPeriodUnit::all();

        return RentalPeriodUnitResource::make($periods);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RentalPeriodUnit $rentalPeriodUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RentalPeriodUnit $rentalPeriodUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RentalPeriodUnit $rentalPeriodUnit)
    {
        //
    }
}
