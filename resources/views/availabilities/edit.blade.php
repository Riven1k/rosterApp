@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Availability</h2>
    @include('availabilities.partials._alerts')
    <form action="{{ route('availabilities.update', $availability->id) }}" method="POST">
        @method('PUT')
        @include('availabilities.partials._form')
        <button type="submit" class="btn btn-primary">Update Availability</button>
    </form>
</div>
@endsection
