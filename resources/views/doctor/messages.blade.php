@extends('layouts.app')
@section('content')
<h2>Messaggi</h2>

<div>
    @if (count(Auth::user()->messages) > 0)
        @foreach ($messages as $message)
            @if (Auth::user()->id === $message->user_id)
                <div class="my-3">
                    <h4>{{ $message->name }}</h4>
                    <p>{{ $message->text }}</p>
                    <h5>{{ $message->created_at }}</h5>
                    <hr>
                </div>
            @endif
        @endforeach
    @else
        <h4>non ci sono messaggi</h4>
    @endif
</div>

@endsection
