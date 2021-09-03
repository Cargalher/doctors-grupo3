@extends('layouts.app')

@section('content')

    <h2>Select Sponsor</h2>

  

    <form action="{{ route('saveSponsor', Auth::user()->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("POST")

    <div class="form-group">
        <div id="form_check" class="form-check">
            @if ($sponsors)
            
                @foreach ($sponsors as $sponsor)

                <input name="amount" id="{{$sponsor->id}}" class="form-check-input d-block" type="radio"
                        value="{{ $sponsor->price }}" >
                        <label class="card" for="{{$sponsor->name}}">
                            <div class="">{{$sponsor->name}} </div>
                            <div>durata: {{$sponsor->duration}} ore</div>
                            <div>{{$sponsor->price}} €</div>
                        </label>
                    

                {{-- <h2>Nome: {{ $sponsor->name }}</h2>
                <h4>Durata: {{ $sponsor->duration }} ore</h4>
                <h4>Prezzo: {{ $sponsor->price }} €</h4> --}}
                   
                @endforeach
            @endif
        </div>
    </div>
    

        <button type="submit" class="btn btn-dark">Acquista</button>
    </form>

        {{-- @foreach ($sponsors as $sponsor)

                <h2>Nome: {{ $sponsor->name }}</h2>
                <h4>Durata: {{ $sponsor->duration }} ore</h4>
                <h4>Prezzo: {{ $sponsor->price }} €</h4>
                <button>Acquista</button>
                
        @endforeach --}}

@endsection