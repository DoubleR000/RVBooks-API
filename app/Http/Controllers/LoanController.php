<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoanResource;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Loan::class);

        $itemsPerPage = $request->page_size ?? 15;
        $query = Loan::query();

        if ($request->user()->can('view-all-loans')) {
            $loans = $query->with(['book', 'user'])->paginate($itemsPerPage);
        } else {
            $loans = $query->where('user_id', $request->user()->id)->with('book')->paginate($itemsPerPage);
        }

        return LoanResource::collection($loans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Loan::class);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Loan $loan)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        Gate::authorize('update', Loan::class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        Gate::authorize('delete', Loan::class);
    }
}
