<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookConditionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookStatusController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TitleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');

Route::apiResource('titles', TitleController::class);
Route::post('titles/restore/{title}', [TitleController::class, 'restore'])->name('titles.restore');

Route::apiResource('authors', AuthorController::class);
Route::post('authors/restore/{author}', [AuthorController::class, 'restore'])->name('authors.restore');

Route::apiResource('genres', GenreController::class);
Route::post('genres/restore/{genre}', [GenreController::class, 'restore'])->name('genres.restore');

Route::apiResource('locations', LocationController::class);
Route::post('locations/restore/{location}', [LocationController::class, 'restore'])->name('locations.restore');

Route::apiResource('book-conditions', BookConditionController::class);
Route::post('book-conditions/restore/{condition}', [BookConditionController::class, 'restore'])->name('book-conditions.restore');

Route::apiResource('book-statuses', BookStatusController::class);
Route::post('book-statuses/restore/{status}', [BookStatusController::class, 'restore'])->name('book-statuses.restore');
