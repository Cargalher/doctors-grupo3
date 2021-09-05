@extends('layouts.app')
@section('content')
<div>
    <h2>Recensioni</h2>
    @if (count(Auth::user()->reviews) > 0)
        @foreach ($reviews as $review)
            @if (Auth::user()->id === $review->user_id)
                <div class="my-3">
                    <h4>{{ $review->name }}</h4>
                    <p>{{ $review->body }}</p>
                    <h5>Voto: {{ $review->vote }}</h5>
                    <hr>
                </div>
            @endif
        @endforeach
    @else
        <h4>non hai recensioni</h4>
    @endif

</div>

@endsection