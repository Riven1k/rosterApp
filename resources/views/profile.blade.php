@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>My Profile</h4>
    </div>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile') }}">
            @csrf
        
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input class="form-control" value="{{ $employee->first_name }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input class="form-control" value="{{ $employee->last_name }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="{{ $employee->dob }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" class="form-control" name="location" value="{{ $employee->location }}">
            </div>

            <button class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</div>
@endsection
