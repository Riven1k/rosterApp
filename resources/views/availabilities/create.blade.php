@extends('layouts.app')

@section('content')
<h1>Create Availability</h1>

<form method="POST" action="{{ route('availabilities.store') }}">
    @csrf
    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control">
    </div>
    <div class="mb-3">
        <label>Start Time</label>
        <input type="time" name="start_time" class="form-control">
    </div>
    <div class="mb-3">
        <label>End Time</label>
        <input type="time" name="end_time" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
