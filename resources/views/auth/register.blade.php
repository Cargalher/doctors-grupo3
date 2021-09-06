@extends('layouts.register')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        @php
                            use App\Specialization;
                            $specializations = Specialization::all();
                        @endphp
                        <form method="POST" action="{{ route('register', compact('specializations')) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        minlength="3" maxlength="30">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('lastname') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ old('lastname') }}" required autocomplete="lastname" autofocus
                                        minlength="3" maxlength="30">

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required
                                        value="{{ old('address') }}" autocomplete="address" minlength="5" maxlength="50">
                                </div>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('city') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" name="city" required
                                        value="{{ old('city') }}" autocomplete="city" minlength="5" maxlength="50">
                                </div>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="province"
                                    class="col-md-4 col-form-label text-md-right">{{ __('province') }}</label>

                                <div class="col-md-6">
                                    <input id="pv" type="text" class="form-control" name="pv" required
                                        value="{{ old('pv') }}" autocomplete="pv" minlength="2" maxlength="30">
                                </div>

                                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="specializations" class="col-md-4 col-form-label text-md-right">Scegli le tue
                                    specializzazioni</label>
                                <div style="width: 60%" id="form_check" class="form-check col-md-6 mx-3">
                                    @if ($specializations)
                                        @foreach ($specializations as $specialization)
                                            @if ($errors->any())
                                                <input name="specializations[]" id="specializations"
                                                    class="form-check-input d-block" type="checkbox"
                                                    value="{{ $specialization->id }}"
                                                    {{ in_array($specialization->id, old('specializations')) ? 'checked' : '' }}>
                                            @endif
                                            <input name="specializations[]" id="specializations"
                                                class="form-check-input d-block " type="checkbox"
                                                value="{{ $specialization->id }}">
                                            <label class="form-check-label d-block" for="specializations">
                                                {{ $specialization->name }}
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('phone_number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control" name="phone_number" required
                                        value="{{ old('phone_number') }}" autocomplete="phone_number" minlength="9"
                                        maxlength="13">
                                </div>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" minlength="3"
                                        maxlength="30">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" minlength="8">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" minlength="8">
                                </div>
                            </div>



                            {{-- da aggiunger le specializzazioni tramite select --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
