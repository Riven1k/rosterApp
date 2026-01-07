<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AvailabilityController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::post('/login', function (Request $request) {
    session(['name' => $request->input('name'), 'user_id' => 1 ]);

    return redirect('/home');
    
})->name('fake.login');

Route::post('/logout', function () {
    session()->forget('name');
    return redirect('/');
})->name('fake.logout');

Route::resource('availabilities', AvailabilityController::class);