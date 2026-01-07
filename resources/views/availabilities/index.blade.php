@extends('layouts.app')

@section('content')
<h1>Availabilities</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('availabilities.create') }}" class="btn btn-primary mb-3">Create New</a>

<table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($availabilities as $availability)
        <tr>
            <td>{{ $availability->date }}</td>
            <td>{{ $availability->name }}</td>
            <td>{{ $availability->start_time }}</td>
            <td>{{ $availability->end_time }}</td>
            <td>
                <a href="{{ route('availabilities.edit', $availability) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('availabilities.destroy', $availability) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this availability?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
