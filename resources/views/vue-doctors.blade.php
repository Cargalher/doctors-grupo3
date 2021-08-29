@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="posts container d-flex flex-wrap">
            <div class="card text-left mb-3 p-4" v-for="doctor in doctors">
                <div class="card-body p-0 mt-4">

                    <h4 class="card-title">@{{ doctor.name }}</h4>
                    <h4 class="card-title">@{{ doctor.lastname }}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection 