@extends('layouts.app')
@section('content')


    <div class="title">
        <button class="button-none">
            <a href="{{ route('dashboard', compact('user')) }}"><i class="fas fa-arrow-left"></i></a>
        </button>
        Sponsorizzazioni
    </div>
    <form class="card" method="post" id="payment-form" style="padding: 20px"
        action="{{ route('checkout', compact('user')) }}">
        @csrf
        @method('POST')
        @if (session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
                <a href="{{ route('dashboard', compact('user')) }}">Torna alla dashboard</a>
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
                        <div class="card">
                            <input type="radio" id="{{ $sponsor->name }}" name="amount" value="{{ $sponsor->price }}">
                            <label for="{{ $sponsor->name }}">
                                <div class="sponsor-name">{{ $sponsor->name }} </div>
                                <div>durata: {{ $sponsor->duration }} giorni</div>
                                <div>{{ $sponsor->price }} €</div>
                            </label>
                        </div>
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
@endsection

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
