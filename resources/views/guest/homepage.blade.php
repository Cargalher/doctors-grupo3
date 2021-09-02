@extends('layouts.guest')

@section('title', 'BDoctors | HomePage')


@section('content')

        @if(session('success'))
            <div class="alert alert-success"> {{session('success')}} </div>
        @endif


    <div class="d-flex flex-wrap justify-content-center">

        @foreach ($doctors as $doctor)

            <div style="width: 300px" class="card m-3 p-3 ">
                <img src="{{ asset('img/Domenico.png') }}" class="p-2" alt="">
                <h4>Nome: {{ $doctor->name }}</h4>
                <h4>Cognome: {{ $doctor->lastname }}</h4>

                <h5>Numero recensioni: {{ count($doctor->reviews) }}</h5>
                
                <!-- Media recensioni -->

                @php
                    $average = 0;
                @endphp

                @foreach($reviews as $review)
                    @if ($doctor->id === $review->user_id)
                        @php
                            $average+= $review->vote;
                        @endphp
                    @endif
                @endforeach

                @if($average != 0)     
                        <h5> Media: {{ round($average / count($doctor->reviews))  }} </h5>       
                    @else
                        <h5> Media: 0</h5>      
                @endif              

                <a href="{{ route('show', $doctor->id) }}" class="btn btn-primary">
                    <i class="fa fa-eye fa-sm fa-fw" aria-hidden="true"></i>
                </a>
            </div>

        @endforeach

        
    </div>
    
    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{$doctors->links()}}
    </div>


@endsection
