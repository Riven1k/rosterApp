@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Roster App</h1>

    <form method="POST" action="{{ route('fake.login') }}">
        @csrf

        <div class="mb-3">
            <label>Your Name</label>
            <input type="text" name="name" required>

        </div>

        <a href="{{ route('availabilities.index') }}">View Availabilities</a>
        <a href="{{ route('availabilities.create') }}">Create Availability</a>


        <button class="btn btn-primary">Enter</button>
        <form method="POST" action="{{ route('fake.logout') }}">
            @csrf
            <button class="btn btn-secondary">Logout</button>
        </form>
    </form>
</div>
@endsection
