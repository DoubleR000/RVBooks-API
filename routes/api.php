<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookConditionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookStatusController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanPriceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TitleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('user');

    Route::apiResource('titles', TitleController::class);
    Route::post('titles/{title}/restore', [TitleController::class, 'restore'])->withTrashed()->name('titles.restore');
    Route::patch('titles/{title}/update-slug', [TitleController::class, 'updateSlug'])->name('titles.update-slug');

    Route::apiResource('authors', AuthorController::class);
    Route::post('authors/restore/{author}', [AuthorController::class, 'restore'])->name('authors.restore');

    Route::apiResource('genres', GenreController::class);
    Route::post('genres/restore/{genre}', [GenreController::class, 'restore'])->name('genres.restore');

    Route::apiResource('locations', LocationController::class);
    Route::post('locations/restore/{location}', [LocationController::class, 'restore'])->name('locations.restore');

    Route::apiResource('book-conditions', BookConditionController::class);
    Route::post('book-conditions/restore/{book_condition}', [BookConditionController::class, 'restore'])->name('book-conditions.restore');

    Route::apiResource('book-statuses', BookStatusController::class);
    Route::post('book-statuses/restore/{book_status}', [BookStatusController::class, 'restore'])->name('book-statuses.restore');

    Route::apiResource('books', BookController::class);
    Route::post('books/{book}/restore', [BookController::class, 'restore'])->withTrashed()->name('books.restore');

    Route::apiResource('loan-prices', LoanPriceController::class);
    Route::post('loan-prices/{loan_price}/restore', [LoanPriceController::class, 'restore'])->withTrashed()->name('loan-prices.restore');

    Route::apiResource('loans', LoanController::class);
});


