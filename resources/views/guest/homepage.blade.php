@extends('layouts.guest')

@section('title', 'BDoctors | HomePage')


@section('content')
    <div id="app">

        @php
            
            $recensioni = [];
            
            $messaggi = [];
            
            foreach ($doctors as $doctor) {
                $totMesDoc = count($doctor->messages);
            
                $totRecDoc = count($doctor->reviews);
            
                array_push($messaggi, $totMesDoc);
            
                array_push($recensioni, $totRecDoc);
            }
            
            $recensioniTotali = array_sum($recensioni);
            
            $messaggiTotali = array_sum($messaggi);
            
        @endphp


        @if (session('success'))
            <div id="confermaMessaggio" class="alert alert-success alert-dismissible fade show"> <a href="#"
                    class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('success') }}
            </div>

            <script type="text/javascript">
                setTimeout(function() {
                    $(".alert").alert('close')
                }, 3000);
            </script>
        @endif

        <div style="height: 200px" class="jumbotron">

        </div>

        <div class="">
            <div class="container">
                <div class="">CERCA IL DOTTORE ADATTO A TE</div>

                <form action="{{ route('toIndex') }}" method="post">
                    @csrf
                    @method('GET')

                    <div class="form-group">

                        {{-- select specializzazioni --}}
                        <select class="form-control" id="specialization" name="specialization" required>
                            <option value="">Seleziona la specializzazione</option>
                            @foreach ($specializations as $spec)
                                <option value="{{ $spec->id }}" class="opt">{{ $spec->name }}</option>
                            @endforeach
                        </select>
                        {{-- pulsante di ricerca --}}
                        <button class="search custom-button" type="submit">
                            Cerca
                        </button>
                    </div>
                </form>
            </div>

            <div class="pt-3">
                <h2 class="text-center text-uppercase">Medici in Evidenza:</h2>

                <div class="d-flex flex-wrap justify-content-center pb-5 pt-2">

                    @foreach ($activeDoctors as $doctor)

                        <div style="width: 300px" class="card m-3 p-3 ">
                            <span class="d-flex flex-wrap justify-content-center">
                                <img src="{{ asset('storage/' . $doctor->profile_image) }}"
                                    onerror="this.src='{{ asset('img/avatar-donna.jpg') }}';" class="rounded-circle p-2"
                                    style="object-fit: cover" width="150" height="150"
                                    alt="{{ $doctor->name . $doctor->name }}">
                            </span>
                            <h4>Nome: {{ $doctor->name }}</h4>
                            <h4>Cognome: {{ $doctor->lastname }}</h4>
                            <h5>Numero recensioni: {{ count($doctor->reviews) }}</h5>

                            <!-- Media recensioni -->

                            @php
                                $average = 0;
                            @endphp

                            @foreach ($reviews as $review)
                                @if ($doctor->id === $review->user_id)
                                    @php
                                        $average += $review->vote;
                                    @endphp
                                @endif
                            @endforeach

                            @if ($average != 0)
                                <h5> Media: {{ round($average / count($doctor->reviews)) }} </h5>
                            @else
                                <h5> Media: 0</h5>
                            @endif

                            <a href="{{ route('show', $doctor->id) }}" class="btn btn-primary">
                                <i class="fa fa-eye fa-sm fa-fw" aria-hidden="true"></i>
                            </a>
                        </div>

                    @endforeach


                </div>
            </div>
            <div class="counters">
                <div class="row mx-0">
                    <div class="col_counter col-12 col-lg-4 py-5">
                        <h4 class="counting" data-count="{{ count($doctors) }}">0</h4>
                        <h4>Medici</h4>
                    </div>
                    <div class="col_counter center col-12 col-lg-4 py-5">
                        <h4 class="counting" data-count="{{ $messaggiTotali }}">0</h4>
                        <h4>Messaggi inviati</h4>
                    </div>
                    <div class="col_counter col-12 col-lg-4 py-5">
                        <h4 class="counting" data-count="{{ $recensioniTotali }}">0</h4>
                        <h4>Recensioni</h4>
                    </div>
                </div>
            </div>

            <div style="height: 500px" class="test">

            </div>


        </div>




    @endsection
