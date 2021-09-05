@include('layouts/partials/head')

@include('layouts/partials/header')

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
                        <a class="nav-link {{ Route::currentRouteName() === 'doctor.edit' ? 'active' : '' }}" href="{{ route('doctor.edit', Auth::user()->id) }}">
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

                    <li class="nav-item nav-pills">
                        <form action="{{ route('doctor.destroy', Auth::user()->id) }}" class="nav-link" method="post">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash fa-xs fa-fw"></i>
                            </button>
                        </form>
                    </li>

                </ul>
            </aside>
        </div>
        <div class="col-sm-10">
            @yield('content')
        </div>
    </div>
</div>

@include('layouts/partials/footer')

</div>

</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
