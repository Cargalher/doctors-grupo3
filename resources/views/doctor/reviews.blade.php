@extends('layouts.app')
@section('content')

    <h2>Recensioni</h2>

    @if (count(Auth::user()->reviews) > 0)
        <div class="table-responsive table-inverse table-striped">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Recensione</th>
                        <th>Voto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        @if (Auth::user()->id === $review->user_id)
                            <tr>
                                <td>{{$review->name}}</td>
                                <td>{{$review->lastname}}</td>
                                <td>{{$review->body}}</td>
                                <td>{{$review->vote}}</td>
                            </tr>
                        @endif
                    @endforeach
                    @else
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Non hai nessuna recensione!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                </tbody>
                    
            </table>
        </div>
    @endif
@endsection