@extends('layouts.app')
@section('content')
<h2>Messaggi</h2>



@if (count(Auth::user()->messages) > 0)
    @foreach ($messages as $message)

            <h4>{{ $message->name }}</h4>
            <p>{{ $message->text }}</p>
            <h5>{{ $message->created_at }}</h5>

    @endforeach
@else
    <h4>non ci sono messaggi</h4>
@endif

@endsection
