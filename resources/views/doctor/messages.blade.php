@extends('layouts.app')
@section('content')
    <h2>Messaggi</h2>

    @if (session('message'))
        <div id="confermaMessaggio" class="alert alert-success alert-dismissible fade show"> <a href="#"
                class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('message') }}</div>

        <script type="text/javascript">
            setTimeout(function() {
                $(".alert").alert('close')
                console.log('Success');
            }, 3000);
        </script>
    @endif


    @if (count(Auth::user()->messages) > 0)
        <div class="table-responsive table-inverse table-striped">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Messaggio</th>
                        <th>Ricevuto</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        @if (Auth::user()->id === $message->user_id)
                            <tr>
                                <td>{{$message->name}}</td>
                                <td>{{$message->lastname}}</td>
                                <td>{{$message->text}}</td>
                                <td>{{$message->created_at }}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->phone_number}}</td>
                                <td>
                                    <form action="{{route('messages.destroy', $message->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-xs fa-fw"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @else
                    <!-- <div class="alert alert-primary" role="alert">
                    <h4>non ci sono messaggi <i class="fas fa-envelope"></i></h4>
                    </div> -->
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Non ci sono Messaggi!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </tbody>
            </table>
        </div>
    @endif
@endsection

