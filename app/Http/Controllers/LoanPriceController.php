<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanPriceRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\UpdateLoanPriceRequest;
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
    public function store(StoreLoanPriceRequest $request)
    {
        $validated = $request->validated();

        $loanPrice = LoanPrice::create($validated);

        return LoanPriceResource::make($loanPrice);
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanPrice $loanPrice)
    {
        return LoanPriceResource::make($loanPrice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanPriceRequest $request, LoanPrice $loanPrice)
    {
        $validated = $request->validated();

        $loanPrice->update($validated);

        return LoanPriceResource::make($loanPrice);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanPrice $loanPrice)
    {
        //
    }
}
