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
                    <a href="{{route('doctor.edit',Auth::user()->id)}}"><i class="far fa-edit"></i>
                    </a>

                    <form action="{{route('doctor.destroy', Auth::user()->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-xs fa-fw"></i></button>
                    </form>
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

                    <h1>Messaggi</h1>
                    @if (count(Auth::user()->messages) > 0)
                        @foreach (Auth::user()->messages as $message)
                            @if (Auth::user()->id === $message->user_id)
                                <h2>{{ $message->name }}</h2>
                                <p>{{ $message->text }}</p>
                                <h5>{{ $message->created_at }}</h5>

                            @endif
                        @endforeach
                    @else
                        <h4>non ci sono messaggi</h4>
                    @endif


                    <!--     @foreach (Auth::user()->reviews as $review)
                            <h2>{{ $review->name }}</h2>
                            @endforeach -->

                </div>
            </div>
        </div>
    </div>
@endsection
