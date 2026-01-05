@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Availabilities</h2>
    @include('availabilities.partials._alerts')

    <a href="{{ route('availabilities.create') }}" class="btn btn-success mb-3">Add New Availability</a>

    @if($availabilities->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Week Start</th>
                    <th>Status</th>
                    <th>Slots</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($availabilities as $availability)
                <tr>
                    <td>{{ $availability->week_start_date->format('Y-m-d') }}</td>
                    <td>
                        <span class="badge bg-{{ $availability->status == 'approved' ? 'success' : ($availability->status == 'rejected' ? 'danger' : 'secondary') }}">
                            {{ ucfirst($availability->status) }}
                        </span>
                    </td>
                    <td>
                        @foreach($availability->slots as $slot)
                            {{ $slot->day_of_week }}: {{ $slot->start_time }} - {{ $slot->end_time }}<br>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('availabilities.edit', $availability->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('availabilities.destroy', $availability->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this availability?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No availabilities found.</p>
    @endif
</div>
@endsection
