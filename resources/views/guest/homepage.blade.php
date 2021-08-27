@extends('layouts.guest')

@section('title', 'BDoctors | HomePage')


@section('content')

    <div class="row">
        @foreach ($doctors as $doc)
            <div class="card col-4">
                <h4>nome: {{ $doc->name }}</h4>
                <h4>cognome: {{ $doc->lastname }}</h4>
            </div>
        @endforeach
    </div>
@endsection
