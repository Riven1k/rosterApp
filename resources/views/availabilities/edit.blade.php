@extends('layouts.app')

@section('content')
<h1>Edit Availability</h1>

<form method="POST" action="{{ route('availabilities.update', $availability) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control" value="{{ old('date', $availability->date) }}">
    </div>

    <div class="mb-3">
        <label>Start Time</label>
        <input type="time" name="start_time" class="form-control" value="{{ old('start_time', $availability->start_time) }}">
    </div>

    <div class="mb-3">
        <label>End Time</label>
        <input type="time" name="end_time" class="form-control" value="{{ old('end_time', $availability->end_time) }}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
