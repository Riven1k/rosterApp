<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvailabilityController;

Route::middleware(['auth'])->group(function () {
    Route::resource('availabilities', App\Http\Controllers\AvailabilityController::class);
});

Route::get('/test', function () {
    return view('availabilities.create');
});

Route::resource('availabilities', AvailabilityController::class);
Route::get('/availabilities/create', [AvailabilityController::class, 'create'])->name('availabilities.create');
Route::post('/availabilities', [AvailabilityController::class, 'store'])->name('availabilities.store');
