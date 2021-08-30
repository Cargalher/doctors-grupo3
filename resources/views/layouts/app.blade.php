@include('layouts/partials/head')

@include('layouts/partials/header')

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <aside>
                <ul class="nav flex-column">
                    <li class="nav-item nav-pills">
                      <a class="nav-link {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}" href="{{route('dashboard')}}"> <i class="fas fa-tachometer-alt fa-lg fa-fw"></i> Dashboard</a>
                    </li>
                    <li class="nav-item nav-pills">
                      <a class="nav-link {{ Route::currentRouteName() === 'messages' ? 'active' : '' }}" href="{{route('messages')}}"><i class="fas fa-envelope fa-lg fa-fw"></i> Messaggi</a>
                    </li>
                    <li class="nav-item nav-pills">
                      {{-- {{dd(Route::currentRouteName())}} --}}
                      <a class="nav-link {{ Route::currentRouteName() === 'reviews' ? 'active' : '' }}" href="{{route('reviews')}}"><i class="fas fa-comment-alt fa-lg fa-fw"></i> Recensioni</a>
                    </li>
                  </ul>
            </aside>
        </div>
        <div class="col-sm-9">
            @yield('content')
        </div>
    </div>
</div>

</div>

</body>

</html>
