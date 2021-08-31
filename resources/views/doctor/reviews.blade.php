@extends('layouts.app')
@section('content')
<div>
    <h2>Recensioni</h2>
    @if (count(Auth::user()->reviews) > 0)
        @foreach ($reviews as $review)
        
            <h2>{{ $review->name }}</h2>
            <p>{{ $review->body }}</p>
            <h5>{{ $review->vote }}</h5>

        @endforeach
    @else
        <h4>non hai recensioni</h4>
    @endif

</div>

@endsection