@extends('layouts.app')

@section('title', 'Availabilities')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Your Availabilities</h2>
    <a href="{{ route('availabilities.create') }}" class="btn btn-success">Add New</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-primary">
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Holiday</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($availabilities as $availability)
            <tr  @if($availability->holiday) class="table-warning" @endif>
                <td>{{ $availability->name }}</td>
                <td>{{ \Carbon\Carbon::parse($availability->date)->format('D, d M') }}</td>                
                <td>{{ $availability->start_time }} - {{ $availability->end_time }}</td>
                <td>
                    @if($availability->holiday)
                        <span class="badge bg-danger text-dark">{{ $availability->holiday }}</span>
                    @else
                        <span class="badge bg-secondary">Regular Day</span>
                    @endif
                </td>
                <td class="text-end">
                    <a href="{{ route('availabilities.edit', $availability->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('availabilities.destroy', $availability->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this entry?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted py-4">No availabilities found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
