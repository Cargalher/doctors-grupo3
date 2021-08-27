@extends('layouts.guest')

@section('title', 'BDoctors | HomePage')


@section('content')

    <div class="">
        <h2>Dott: {{ $user->name }}</h2>
        <h2> {{ $user->lastname }}</h2>
    </div>
@endsection
