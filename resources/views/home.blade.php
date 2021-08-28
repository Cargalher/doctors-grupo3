@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        {{ Auth::user()->name }}
                        {{ Auth::user()->lastname }}

                    </div>

                </div>

                <div>
                    <p> {{ Auth::user()->id }}</p>
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
                    <!--     @foreach (Auth::user()->reviews as $review)
                        <h2>{{ $review->name }}</h2>
                        @endforeach -->

                </div>
            </div>
        </div>
    </div>
@endsection
