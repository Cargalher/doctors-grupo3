@extends('layouts.app')
@section('content')
<div>
    <h2>Recensioni</h2>
    @if (count(Auth::user()->reviews) > 0)
        @foreach ($reviews as $review)
            <!-- @if (Auth::user()->id === $review->user_id) -->
            <h2>{{ $review->name }}</h2>
            <p>{{ $review->body }}</p>
            <h5>{{ $review->vote }}</h5>

            <!-- @endif -->
        @endforeach
    @else
        <h4>non hai recensioni</h4>
    @endif

</div>

@endsection