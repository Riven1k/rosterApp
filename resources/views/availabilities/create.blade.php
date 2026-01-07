@extends('layouts.app')

@section('title', 'Add Availability')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">Add Availability</div>
    <div class="card-body">
        <form action="{{ route('availabilities.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Start Time</label>
                <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">End Time</label>
                <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('availabilities.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
