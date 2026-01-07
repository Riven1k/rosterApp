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

        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('availabilities.index') }}'">View Availabilities</button>
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('availabilities.create') }}'">Create Availability</button>
        <button class="btn btn-primary">Enter</button>
        <form method="POST" action="{{ route('fake.logout') }}">
            @csrf
            <button class="btn btn-secondary">Logout</button>
        </form>
    </form>
</div>
@endsection
