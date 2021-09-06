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
                                <td>
                                    {{ substr(strip_tags($review->body), 0, 100)}}
                                    <a href="{{route('reviews', $review->id)}}"class="readmore">{{ strlen(strip_tags($review->body)) > 50 ? '...ReadMore' : '' }} </a>
                                </td>
                                <td>{{$review->vote}}</td>
                            </tr>
                        @endif
                    @endforeach
                    @else
                        <h4>non hai recensioni</h4>
                </tbody>
                    
            </table>
        </div>
    @endif
@endsection