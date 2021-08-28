@extends('layouts.guest')

@section('title', 'BDoctors | HomePage')


@section('content')
    {{-- dottore singolo --}}
    <div class="">
        <h2>Dott: {{ $user->name }}</h2>
        <h2> {{ $user->lastname }}</h2>
    </div>
    <h2>Scrivi il tuo messaggio</h2>
    {{-- form per inviare un messaggio al dottore --}}

    @include('partials.errors')

    <form action="{{ route('saveMessage', compact('user')) }}" method="post">
        @csrf
        @method('POST')
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Nuovo messaggio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    {{-- NOME --}}
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="name">Nome</label>
                        <input type="text" class="form-control validate" name="name" required minlength="3" maxlength="50">
                    </div>
                    {{-- COGNOME --}}
                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="lastname">Cognome</label>
                        <input type="text" class="form-control validate" name="lastname" required minlength="3"
                            maxlength="50">
                    </div>
                    {{-- EMAIL --}}
                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="email">E-Mail</label>
                        <input type="email" class="form-control validate" name="email" required>
                    </div>
                    {{-- NUMERO DI TELEFONO --}}
                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="phone_number">Numero di
                            telefono</label>
                        <input type="text" class="form-control validate" name="phone_number" required minlength="9"
                            maxlength="10">
                    </div>
                    {{-- MESSAGGIO --}}
                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="">Messaggio</label>
                        <textarea name="text" id="text" cols="54" rows="3" required minlength="30"></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn custom-button">Invia messaggio</button>
                </div>
            </div>
        </div>
    </form>

@endsection
