@extends('layouts.guest')

@section('title', 'BDoctors | HomePage')


@section('content')

    {{-- dottore singolo --}}
    <div class="">
        <img width="250" src="{{asset('storage/' . $user->profile_image)}}" alt="">
        <h3>Dott: {{ $user->name }} {{ $user->lastname }}</h3>
    </div>

    {{-- pulsante per inviare un messaggio --}}
    <button class="btn custom-button " data-toggle="modal" data-target="#modalMessage">
        <i class="fas fa-comment-medical"></i> Invia un messaggio
    </button>

    {{-- form per inviare un messaggio al dottore --}}
    @include('layouts.partials.errors')
    <div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control validate" name="name" required minlength="3"
                                maxlength="50">
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
    </div>



    {{-- form per inviare una Recensione al dottore --}}
    @include('layouts.partials.errors')
    <div class="modal fade" id="modalReview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form action="{{ route('saveReview', compact('user')) }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Nuova recensione</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        {{-- NOME --}}
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="name">Nome</label>
                            <input type="text" class="form-control validate" name="name" required minlength="3"
                                maxlength="50">
                        </div>
                        {{-- COGNOME --}}
                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="lastname">Cognome</label>
                            <input type="text" class="form-control validate" name="lastname" required minlength="3"
                                maxlength="50">
                        </div>

                        {{-- TITLE --}}
                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="title">Title</label>
                            <input type="title" class="form-control validate" name="title" required>
                        </div>

                        {{-- VOTE --}}
                        <div class="md-form mb-4">
                            
                            <div class="form-group">
                                <label for="vote"></label>
                                <select class="custom-select" name="vote" id="vote">
                                    <option selected>Select one</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                        </div>

                        {{-- MESSAGGIO --}}
                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="">Testo</label>
                            <textarea name="body" id="body" cols="54" rows="3" required minlength="30"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn custom-button">Invia recensione</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Recensioni -->
    <div>
        <h2 class="mt-5">Recensioni:</h2>

        {{-- pulsante per inviare un messaggio --}}
    <button class="btn custom-button " data-toggle="modal" data-target="#modalReview">
        <i class="fas fa-comment-medical"></i> Invia una recensione
    </button>

        @if (count($user->reviews) > 0)
            @foreach ($reviews as $review)
                @if($review->user_id === $user->id)
            
                    <div class="mb-2">
                        <h5>{{ $review->name }} {{ $review->lastname }}</h5>
                        <h5>{{ $review->title }}</h5>
                        <p>{{ $review->body }}</p>
                        <h5>Voto: 

                        @for ($i = 0; $i < $review->vote; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                            

                        </h5>
                    </div>

                @endif
            @endforeach
        @else
            <h4>Nessuna recensione ricevuta</h4>
        @endif
    </div>

@endsection

