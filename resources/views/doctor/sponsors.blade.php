<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Test rotte </title>

    {{-- FaviIcon --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo_small_icon_only_inverted.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

        <a class="navbar-brand" href="{{ url('/') }}">
            <img width="200" src="{{ asset('img/logo_small.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('Homepage') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('home') }}">
                                {{ __('HomePage') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </nav>

    <main>
        <div class="title">
            <button class="button-none">
                <a href="{{ route('dashboard', Auth::user()->id) }}"><i class="fas fa-arrow-left"></i></a>
            </button>
            Sponsorizzazioni
        </div>
        <form class="card" method="post" id="payment-form" style="padding: 20px"
            action="{{ route('checkout', Auth::user()->id) }}">
            @csrf
            @method('POST')
            @if (session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message') }}
                    <a href="{{ route('dashboard', Auth::user()->id) }}">Torna alla dashboard</a>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (!session('success_message'))
                <div class="form-content">
                    <div class="text">Scegli una sponsorizzazione per apparire tra i medici in evidenza nella
                        homepage!</div>
                    <div class="spons-container">
                        @foreach ($sponsors as $sponsor)
                            <input type="radio" id="{{ $sponsor->name }}" name="amount"
                                value="{{ $sponsor->price }}">
                            <label class="card" for="{{ $sponsor->name }}">
                                <div class="sponsor-name">{{ $sponsor->name }} </div>
                                <div>durata: {{ $sponsor->duration }} giorni</div>
                                <div>{{ $sponsor->price }} €</div>
                            </label>
                        @endforeach
                    </div>
                    <section>
                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>
                        </div>
                    </section>
                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                    <button class="custom-button" type="submit"><span>Procedi al pagamento</span></button>
                </div>
            @endif
        </form>
    </main>

    <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";
        braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
            paypal: {
                flow: 'vault'
            }
        }, function(createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    // Add the nonce to the form and submit
                    document.querySelector('#nonce').value = 'fake-valid-visa-nonce';
                    console.log(document.querySelector('#nonce').value)
                    form.submit();
                });
            });
        });
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>



</body>

</html>
