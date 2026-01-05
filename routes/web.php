<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::resource('availabilities', App\Http\Controllers\AvailabilityController::class);
});

Route::get('/test', function () {
    return view('availabilities.create');
});

