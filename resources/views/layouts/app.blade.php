@include('layouts/partials/head')

@include('layouts/partials/header')


<div style="background-color: white">
    <div class="container py-5">
        <div class="row">
            <div class="col-sm-2">
                <aside>
                    <ul class="nav flex-column">
                        <li class="nav-item nav-pills">
                            <a class="nav-link {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}"
                                href="{{ route('dashboard') }}"> <i class="fas fa-tachometer-alt fa-lg fa-fw"></i>
                                Dashboard</a>
                        </li>
                        <li class="nav-item nav-pills">
                            <a class="nav-link {{ Route::currentRouteName() === 'messages' ? 'active' : '' }}"
                                href="{{ route('messages') }}"><i class="fas fa-envelope fa-lg fa-fw"></i> Messaggi</a>
                        </li>
                        <li class="nav-item nav-pills">
                            <a class="nav-link {{ Route::currentRouteName() === 'reviews' ? 'active' : '' }}"
                                href="{{ route('reviews') }}"><i class="fas fa-comment-alt fa-lg fa-fw"></i>
                                Recensioni</a>
                        </li>
                        <li class="nav-item nav-pills">
                            <a class="nav-link {{ Route::currentRouteName() === 'doctor.edit' ? 'active' : '' }}"
                                href="{{ route('doctor.edit', Auth::user()->id) }}">
                                <i class="far fa-edit fa-lg fa-fw"></i>
                                Modifica profilo
                            </a>
                        </li>
                        <li class="nav-item nav-pills">
                            <a class="nav-link {{ Route::currentRouteName() === 'sponsors' ? 'active' : '' }}"
                                href="{{ route('buySponsorship', Auth::user()->id) }}"><i
                                    class="fas fa-dollar-sign fa-fw"></i>
                                Sponsor</a>
                        </li>

                        <!-- <li class="nav-item nav-pills">
                            <form action="{{ route('doctor.destroy', Auth::user()->id) }}" class="nav-link"
                                method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash fa-xs fa-fw"></i>
                                </button>
                            </form>
                        </li> -->

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            <i class="fas fa-trash fa-xs fa-fw"></i>
                            Cancella Profilo
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><i
                                                class="fas fa-exclamation-triangle text-warning"></i> Sei sicuro di
                                            cancellare il tuo profilo?</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di eliminare? Questo processo è irreversibile.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Annulla</button>
                                        <form action="{{ route('doctor.destroy', Auth::user()->id) }}"
                                            class="nav-link" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Cancella</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </aside>
            </div>

            <main class="col-sm-10">
                @yield('content')
            </main>
        </div>
    </div>
</div>

@include('layouts/partials/footer')

</body>

</html>
