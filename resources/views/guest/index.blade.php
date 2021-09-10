@extends('layouts.guest')

@section('content')

    <div id="app" class="container">
        <index-component :selected="{{$selected}}" :specializations="{{$specializations}}"></index-component>
    </div>

@endsection
