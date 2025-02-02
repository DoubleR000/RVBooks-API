<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoanPriceResource;
use App\Models\LoanPrice;
use Illuminate\Http\Request;

class LoanPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $itemsPerPage = $request->page_size ?? 15;
        $loanPrices = LoanPrice::paginate($itemsPerPage);

        return LoanPriceResource::collection($loanPrices);
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
    public function show(LoanPrice $loanPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoanPrice $loanPrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanPrice $loanPrice)
    {
        //
    }
}
