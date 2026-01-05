@extends('layouts.app')

@section('content')
<h1>Create Availability</h1>

@include('availabilities.partials._alerts')

<form method="POST" action="{{ route('availabilities.store') }}">
    @csrf
    <!-- form fields here -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
