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
    
            @foreach ($messages as $message)
                @if (Auth::user()->id === $message->user_id)


                    <div class="card rounded shadow mb-3" >
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="text-center text-info"><i class="far fa-user text-success"></i> {{$message->name}} {{$message->lastname}}</h5>
                            <p><span class="text-info">Ricevuto:</span>  {{$message->created_at }}</p>
                        </div>
                                
                                    <div class="card-body text-secondary row">
                                        
                                        <div class="col-lg-11">
                                            
                                            <p> <span class="text-info">Messaggio:</span> {{$message->text}}</p>
                                            <p><span class="text-info">Telefono:</span> {{$message->phone_number}}</p>
                                            <p><span class="text-info">Email:</span> <a href="mailto:{{$message->email}}">{{$message->email}}</a></p>
                                        </div>
                                        <div class="col-lg-1 d-flex flex-column justify-content-center">
                                            <form action="{{route('messages.destroy', $message->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash fa-xs fa-fw"></i></button>
                                            </form>
                                        </div>
                                    </div>
                            </div>

                @endif
            @endforeach
            @else
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Non ci sono Messaggi!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
           
       
    
@endif
@endsection

