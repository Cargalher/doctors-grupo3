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

                <input name="sponsors[]" id="sponsors" class="form-check-input d-block" type="checkbox"
                        value="{{ $sponsor->id }} {{ $doctor->sponsors->contains($sponsor) ? 'checked' : '' }}" >
                    <label class="form-check-label d-block" for="sponsors">
                        {{ $sponsor->name }}
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