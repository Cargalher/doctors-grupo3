@extends('layouts.app')
@section('content')
    <h2>Messaggi</h2>

    @if (count(Auth::user()->messages) > 0)
        <div class="table-responsive table-inverse table-striped">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Mesaggio</th>
                        <th>Ricevuto</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        @if (Auth::user()->id === $message->user_id)
                            <tr>
                                <td>{{$message->name}}</td>
                                <td>{{$message->lastname}}</td>
                                <td>
                                    {{ substr(strip_tags($message->text), 0, 100)}}
                                    <a href="{{route('messages', $message->id)}}"class="readmore">{{ strlen(strip_tags($message->text)) > 50 ? '...ReadMore' : '' }} </a>
                                </td>
                                <td>{{$message->created_at }}</td>
                                <td>{{$message->phone_number}}</td>
                                <td>
                                    <form action="" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-xs fa-fw"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @else
                        <h4>non ci sono messaggi</h4>
                </tbody>
            </table>
        </div>
    @endif
@endsection

