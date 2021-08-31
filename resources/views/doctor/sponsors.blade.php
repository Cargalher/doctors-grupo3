@extends('layouts.app')

@section('content')

    <h2>Select Sponsor</h2>

        @foreach ($sponsors as $sponsor)

                <h2>Nome: {{ $sponsor->name }}</h2>
                <h4>Durata: {{ $sponsor->duration }} ore</h4>
                <h4>Prezzo: {{ $sponsor->price }} €</h4>
                <button>Acquista</button>
                
        @endforeach

@endsection