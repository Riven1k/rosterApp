@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <h1>Roster App</h1>

    <form method="POST" action="{{ route('fake.login') }}">
        @csrf

        <div class="mb-3">
            <label>Your Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="mb-3 d-flex gap-2">
            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('availabilities.index') }}'">View Availabilities</button>
            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('availabilities.create') }}'">Create Availability</button>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-success">Login</button>
            <form method="POST" action="{{ route('fake.logout') }}">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form>
        </div>
    </form>
</div>
@endsection
