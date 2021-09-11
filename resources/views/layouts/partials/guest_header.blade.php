<body>

    <header>
        <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">

            <a class="navbar-brand" href="{{ url('/') }}">
                <img width="222" class="img-fluid" src="{{ asset('img/logo_small.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <div>

                    </div>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest

                        @if (Route::has('register'))
                            <li class="nav-item mr-3">
                                <a class="nav-link border border-info rounded text-info font-weight-bold" href="{{ route('register') }}">Sei un dottore? Iscriviti</a>
                            </li>
                        @endif
                        <li class="nav-item font-weight-bold">
                            <a class="nav-link text-success" href="{{ route('login') }}">{{ __('Accedi') }} <i
                                    class="far fa-user-circle h5 text-success"></i>
                            </a>
                        </li>

                    @else
                        <li class="nav-item dropdown font-weight-bold">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-success" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    {{ __('DashBoard') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>

        </nav>
    </header>
