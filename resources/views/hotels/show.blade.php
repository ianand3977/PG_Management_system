@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hotel Details</h1>
        <p>Name: {{ $hotel->name }}</p>
    </div>
@endsection
