@extends('layouts.guest')

@section('title', 'BDoctors | HomePage')


@section('content')



<div class="d-flex flex-wrap justify-content-center">
    @foreach ($doctors as $doc)


        <div style="width: 300px" class="card m-3 p-3 ">
            <img src="{{asset('img/Domenico.png')}}" class="p-2" alt="">
            <h4>nome: {{ $doc->name }}</h4>
            <h4>cognome: {{ $doc->lastname }}</h4>
            <a href="{{ route('show', $doc->id) }}" class="btn btn-primary">
                <i class="fa fa-eye fa-sm fa-fw" aria-hidden="true"></i>
            </a>
        </div>


    @endforeach
</div>

@endsection
