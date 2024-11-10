@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Hotel</h1>
        <form method="POST" action="{{ route('hotels.update', $hotel->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Hotel Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
