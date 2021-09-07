@extends('layouts.guest')

@section('title', 'BDoctors | HomePage')


@section('content')


    {{-- show dottore page --}}
    <div class="container">

        {{-- messaggio di avvenuta recensione --}}
        @if (session('success'))
            <div id="confermaRecensione" class="alert alert-success alert-dismissible fade show"> <a href="#"
                    class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('success') }}
            </div>

            <script type="text/javascript">
                setTimeout(function() {
                    $(".alert").alert('close')
                    console.log('Success');
                }, 3000);
            </script>
        @endif


        <div class="row">
            <div class="col-8">
                {{-- dottore singolo --}}
                <div>
                    <img width="200" src="{{ asset('storage/' . $user->profile_image) }}"
                        onerror="this.src='{{ asset('img/avatar-donna.jpg') }}';" class="p-2"
                        alt="{{ $user->name . $user->name }}">
                    <h3>Dott: {{ $user->name }} {{ $user->lastname }}</h3>

                </div>



                {{-- pulsante per inviare un messaggio --}}
                <button class="btn custom-button " data-toggle="modal" data-target="#modalMessage">
                    <i class="fas fa-comment-medical"></i> Invia un messaggio
                </button>
            </div>
            <div class="col-4">
                @php
                    $star5 = [];
                    $star4 = [];
                    $star3 = [];
                    $star2 = [];
                    $star1 = [];
                    foreach ($user->reviews as $review) {
                        switch ($review->vote) {
                            case 5:
                                array_push($star5, $review->vote);
                    
                                break;
                            case 4:
                                array_push($star4, $review->vote);
                                break;
                            case 3:
                                array_push($star3, $review->vote);
                                break;
                            case 2:
                                array_push($star2, $review->vote);
                                break;
                            case 1:
                                array_push($star1, $review->vote);
                                break;
                        }
                    }
                    
                    $cinquestelle = (count($star5) * 100) / count($user->reviews);
                    $quattrostelle = (count($star4) * 100) / count($user->reviews);
                    $trestelle = (count($star3) * 100) / count($user->reviews);
                    $duestelle = (count($star2) * 100) / count($user->reviews);
                    $unastella = (count($star1) * 100) / count($user->reviews);
                    $sum5 = array_sum($star5);
                    $sum4 = array_sum($star4);
                    $sum3 = array_sum($star3);
                    $sum2 = array_sum($star2);
                    $sum1 = array_sum($star1);
                    $totalSum = ($sum5 + $sum4 + $sum3 + $sum2 + $sum1) / count($user->reviews);
                    
                @endphp
                <div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating">
                    <h5 class="mb-0 mb-4">Recensioni dei Clienti </h5>
                    <div class="graph-star-rating-header">
                        <div class="star-rating">
                            <b>Numero totale recensioni: {{ count($user->reviews) }}</b>
                        </div>
                        <p class="text-black mb-4 mt-2">Media voti {{ round($totalSum, 1) }} su 5</p>
                    </div>
                    <div class="graph-star-rating-body">
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                                5 Star
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: {{ $cinquestelle }}%" aria-valuemax="5" aria-valuemin="0"
                                        aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black">{{ round($cinquestelle) }}%</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                                4 Star
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: {{ $quattrostelle }}%" aria-valuemax="5" aria-valuemin="0"
                                        aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black">{{ round($quattrostelle) }}%</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                                3 Star
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: {{ $trestelle }}%" aria-valuemax="5" aria-valuemin="0"
                                        aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black">{{ round($trestelle) }}%</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                                2 Star
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: {{ $duestelle }}%" aria-valuemax="5" aria-valuemin="0"
                                        aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black">{{ round($duestelle) }}%</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                                1 Star
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: {{ $unastella }}%" aria-valuemax="5" aria-valuemin="0"
                                        aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black">{{ round($unastella, 0) }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





    {{-- form per inviare un messaggio al dottore --}}
    @include('layouts.partials.errors')
    <div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
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
                            <input type="text" class="form-control validate" id="name" name="name" required
                                autocomplete="name" autofocus placeholder="Nome..." minlength="3" maxlength="50">
                            <small class="form-text text-muted" id="nameHelp">(*) Il Tuo Nome Deve Contenere min:3,
                                max:50
                                caratteri</small>
                        </div>

                        {{-- COGNOME --}}
                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="lastname">Cognome</label>
                            <input type="text" class="form-control validate" name="lastname" required
                                autocomplete="lastname" autofocus placeholder="Cognome..." minlength="3" maxlength="50">
                            <small id="lastnameHelp" class="text-form text-muted">(*) Il Tuo Cognome Deve Contenere
                                min:3,
                                max:50 caratteri</small>
                        </div>
                        {{-- EMAIL --}}
                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="email">E-Mail</label>
                            <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$"
                                class="form-control validate" required autocomplete="email" autofocus
                                placeholder="e-mail valida...">
                            <small id="emailHelp" class=" text-form text-muted">(*) Esempio e-mail...
                                exemple@gmail.it</small>
                            @error('email')
                                <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- NUMERO DI TELEFONO --}}
                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="phone_number">Numero di
                                telefono</label>
                            <input type="tel" pattern="^[0-9+\s]*$" class="form-control validate" id="phone_number"
                                name="phone_number" required autocomplete="phone_number" autofocus minlength="9"
                                maxlength="13" placeholder="Inserisci il tuo numero di telefono">
                            <small id="phone_numberHelp" class="form-text text-muted">(*) Numero di Telefono, puoi
                                utilizzare
                                min 9, max 13 caratteri </small>
                        </div>
                        {{-- MESSAGGIO --}}
                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="">Messaggio</label>
                            <textarea name="text" id="text" cols="54" rows="3" required minlength="30"
                                placeholder="Inserisci il tuo messaggio..." {{ old('text') }}></textarea>
                            <small id="textHelp" class="form-text text-muted">(*) Il Testo Deve contenere almeno 30
                                caratteri</small>
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
    <div class="modal fade" id="modalReview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
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
                            <input type="text" class="form-control validate" name="name" id="name" required
                                autocomplete="name" autofocus minlength="3" maxlength="50"
                                placeholder="Inserisci il tuo nome">
                            <small id="nameHelp" class="text-form text-muted">(*) Il tuo Nome deve contenere min:3,
                                max:50
                                caratteri </small>
                        </div>
                        {{-- COGNOME --}}
                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="lastname">Cognome</label>
                            <input type="text" class="form-control validate" name="lastname" id="lastname" required
                                autocomplete="lastname" autofocus minlength="3" maxlength="50"
                                placeholder="Inserisci il tuo cognome">
                            <small id="lastnameHelp" class="text-form text-muted">(*) Il tuo Cognome deve contenere
                                min:3,
                                max:50 caratteri</small>
                        </div>

                        {{-- TITLE --}}
                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="title">Titolo</label>
                            <input type="title" class="form-control validate" name="title" id="title" required
                                autocomplete="title" autofocus placeholder="Inserisci un titolo per la recensione"
                                minlength="10">
                            <small id="title" class="text-form text-muted">(*) Il Titolo deve contenere almeno 10
                                caratteri</small>
                        </div>

                        {{-- VOTE --}}
                        <div class="md-form mb-4">

                            <div class="form-group">
                                <label for="vote">Dai un voto al Dottore</label>
                                <select class="custom-select" name="vote" id="vote" required autofocus>
                                    <option selected>Seleziona il tuo voto da 1 a 5</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <div class="alert alert-warning alert-dismissible fade show">
                                    <strong>Attenzione!</strong> Devi selezionare un voto!
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            </div>


                        </div>

                        {{-- MESSAGGIO --}}
                        <div class="md-form mb-4">
                            <label data-error="wrong" data-success="right" for="">Testo</label>
                            <textarea name="body" id="body" cols="54" rows="3" required autocomplete="body" autofocus
                                minlength="30" placeholder="Inserisci il tuo testo per la recensione"></textarea>
                            <p>
                                <small id="bodyHelp" class="text-form text-muted">
                                    (*) Il testo delle recensione deve contenere
                                    minimo 30 caratteri</small>
                            </p>

                        </div>
                    </div>

                    {{-- BOTTONE INVIA RECENSIONE --}}
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
                @if ($review->user_id === $user->id)

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
