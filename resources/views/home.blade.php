@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        {{ Auth::user()->name }}
                        {{ Auth::user()->lastname }}

                    </div>
                    
                </div>

                <a href="{{route('doctor.edit',Auth::user()->id)}}"><i class="far fa-edit"></i>
                </a>

                <form action="{{route('doctor.destroy', Auth::user()->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-xs fa-fw"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
