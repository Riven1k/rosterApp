<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AvailabilityController;
use App\Models\Employee;
use App\Models\User;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

//fake login

Route::post('/login', function (Request $request) {
    $name = trim($request->input('name'));
    session(['name' => $name]);

    $parts = explode(' ', $name, 2);
    $first = $parts[0];
    $last = $parts[1] ?? '';

    $user = User::firstOrCreate(
        ['name' => $name],
        [
            'email' => $name . '@fake.local',
            'password' => bcrypt('fakepassword'),
        ]
    );

    $employee = Employee::firstOrCreate(['user_id' => $user->id]);

    $employee->update([
        'first_name' => $first,
        'last_name' => $last,
    ]);

    session([
        'user_id' => $user->id,
        'name' => $name
    ]);

    return redirect('/home');
})->name('fake.login');

//profile page

Route::get('/profile', function () {
    $employee = Employee::where('user_id', session('user_id'))->first();
    return view('profile', compact('employee'));
})->name('profile');

//updating profile

Route::post('/profile', function (Request $request) {
    $employee = Employee::where('user_id', session('user_id'))->first();

    $employee->update([
        'dob' => $request->dob,
        'location' => $request->location,
    ]);

    return redirect()->route('profile')->with('success', 'Profile updated!');
});

//logout

Route::post('/logout', function () {
    session()->forget(['user_id', 'name']);
    return redirect('/');
})->name('fake.logout');

//other routes

Route::resource('availabilities', AvailabilityController::class);