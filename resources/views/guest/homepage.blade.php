@extends('layouts.guest')

@section('title', 'BDoctors | HomePage')


@section('content')


    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($doctors as $doctor)


            <div style="width: 300px" class="card m-3 p-3 ">
                <img src="{{ asset('img/Domenico.png') }}" class="p-2" alt="">
                <h4>nome: {{ $doctor->name }}</h4>
                <h4>cognome: {{ $doctor->lastname }}</h4>

             <h1>Numero recensioni: {{ count($doctor->reviews) }}</h1>


                    @php
                        $average = 
                    @endphp

                    
                @foreach($reviews as $review)
                @if ($doctor->id === $review->user_id)
                
                    <h5> {{$review->sum('vote')}} </h5>
                @endif
                @endforeach
                


                <a href="{{ route('show', $doctor->id) }}" class="btn btn-primary">
                    <i class="fa fa-eye fa-sm fa-fw" aria-hidden="true"></i>
                </a>
            </div>


        @endforeach
    </div>

@endsection
