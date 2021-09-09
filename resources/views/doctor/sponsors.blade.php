@extends('layouts.app')
@section('content')


    
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
            <div>
                <!-- <h1 class="text-center pb-5">Scegli una sponsorizzazione per apparire tra i medici in evidenza <br> nella
                homepage!</h1>
                 -->
                <div class="card-group">
                
                    @foreach ($sponsors as $sponsor)
                        <div class="card border m-5 text-center shadow-sm">
                        <i style="font-size: 3rem; color:#45BB67;" class="fas fa-money-check-alt mt-4"></i>
                            <label class="card-body text-center" for="{{ $sponsor->name }}">
                                <h3 class="sponsor-name card-title text-center">{{ $sponsor->name }} </h3>
                                <p class="card-text">durata: {{ $sponsor->duration }} giorni</p>
                                <p class="card-text"><small class="font-weight-bold text-monospace">{{ $sponsor->price }} €</small></p>
                                <input class="text-center" type="radio" id="{{ $sponsor->name }}" name="amount" value="{{ $sponsor->price }}">
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
@endsection
