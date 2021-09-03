@extends('layouts.app')


@section('content')

    {{-- titolo pagina EDIT DOCTOR --}}
    <h1 class="text-center">Edit Profile</h1>

    @include('layouts.partials.errors')

    <form action="{{ route('doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")


        {{-- NOME DOTTORE --}}
        <div class="form-group">
            <label for="name" class="font-weight-bold">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $doctor->name }}" @error('title')
                is-invalid @enderror placeholder="Nome..." required>
            <small id="nameHelp" class="text-muted">SUGGERIMENTO PER IL NOME: deve contenere min:3, max:50
                caratteri</small>
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- COGNOME DOTTORE --}}
        <div class="form-group">
            <label for="lastname" class="font-weight-bold">Lastname</label>
            <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $doctor->lastname }}"
                @error('lastname') is-invalid @enderror placeholder="Cognome..." required>
            <small id="lastnameHelp" class="text-muted">SUGGERIMENTO PER IL COGNOME: deve contenere min:3, max:50
                caratteri</small>
        </div>
        @error('lastname')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- IMMAGINE DEL DOTTORE --}}
        <div class="form-group">
            {{-- immagine precedente --}}
            <label for="name" class="font-weight-bold d-block">Inserisci la tua immagine</label>
            <img style="width: 200px" src="{{ asset('storage/' . $doctor->profile_image) }}" class="p-2"
                alt="{{ $doctor->name . $doctor->name }}">
            <small id="nameHelp" class="text-muted">immagine di profilo attuale</small>
            {{-- immagine da editare --}}
            <input type="file" class="form-control-file @error('profile_image')is-invalid @enderror" name="profile_image"
                id="profile_image">
            <small id="fileHelpId" class="form-text text-muted">SUGGERIMENTO: Formati consentiti(jpeg, png, bmp, gif, svg,
                webp) max: 2MB</small>
        </div>
        @error('profile_image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- SPECIALIZZAZIONE DOTTORI --}}
        <div class="form-group">
            <label for="chechHelp" class="font-weight-bold d-block">Specializzazioni:</label>
            <div id="form_check" class="form-check">
                @if ($specializations)
                    @foreach ($specializations as $specialization)
                        @if ($errors->any())
                            <input name="specializations[]" id="specializations"
                                class="form-check-input d-block @error('specializations')is-invalid @enderror"
                                type="checkbox" value="{{ $specialization->id }}">
                        @endif
                        <input name="specializations[]" id="specializations" class="form-check-input d-block"
                            type="checkbox" value="{{ $specialization->id }}"
                            {{ $doctor->specializations->contains($specialization) ? 'checked' : '' }}>
                        <label class="form-check-label d-block" for="specializations">
                            {{ $specialization->name }}
                        </label>
                    @endforeach
                @endif
            </div>
            <small id="chechHelp" class="form-text text-muted">SUGGERIMENTO: Seleziona almeno una o più
                specializzazioni</small>
        </div>
        @error('specializations')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        {{-- CURRICULUM DOTTORE --}}
        <div class="form-group">
            <label for="curriculum" class="font-weight-bold">Curriculum</label>
            <textarea name="curriculum" class="form-control" id="curriculum" cols="30" rows="8" placeholder="Compila il tuo CV
                                                                                                            Titoli conseguiti,
                                                                                                            Curriculum e attività,
                                                                                                            Apparecchiature utilizzate,
                                                                                                            Patologie trattate
                                                                                                            Metodologie diagnostiche e terapeutiche,
                                                                                                            Laurea e abilitazione
                                                                                                            "
                {{ old('curriculum') }}>{{ $doctor->curriculum }}</textarea>
            <small id="curriculum" class="form-text text-muted">SUGGERIMENTO: Compila nella text area il tuo CV</small>
        </div>
        @error('curriculum')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- SERVIDI DEL DOTTORE --}}
        <div class="form-group">
            <label for="service" class="font-weight-bold">Service</label>
            <textarea name="service" class="form-control" id="service" cols="30" rows="5" placeholder="Le prestazioni..."
                {{ old('curriculum') }}>{{ $doctor->service }}</textarea>
            <small id="service" class="form-text text-muted">SUGGERIMENTO: Descrivi le tue prestazioni</small>
        </div>
        @error('service')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- CITTA' DOTTORE --}}
        <div class="form-group">
            <label for="city" class="font-weight-bold">Città</label>
            <input type="text" class="form-control" name="city" id="city" value="{{ $doctor->city }}" minlength="3"
                maxlength="50" placeholder="Città...">
            <small id="city" class="form-text text-muted">SUGGERIMENTO: Città, max:50 caratteri</small>
            @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>

        {{-- PROVINCIA DOTTORE --}}
        <div class="form-group">
            <label for="pv" class="font-weight-bold">Provincia</label>
            <input type="text" class="form-control" name="pv" id="pv" value="{{ $doctor->pv }}" minlength="2"
                maxlength="50" placeholder="Provincia...">
            <small id="pv" class="form-text text-muted">SUGGERIMENTO: Provincia, puoi utilizzare min 2, max 50
                caratteri</small>
            @error('pv')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>

        {{-- INDIRIZZO DOTTORE --}}
        <div class="form-group">
            <label for="address" class="font-weight-bold">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $doctor->address }}"
                minlength="5" maxlength="255" placeholder="Indirizzo...">
            <small id="address" class="form-text text-muted">SUGGERIMENTO: Indirizzo, puoi utilizzare min 5, max 255
                caratteri</small>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>

        {{-- EMAIL DOTTORE --}}
        <div class="form-group">
            <label for="email" class="font-weight-bold">Mail</label>
            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" class="form-control" name="email"
                id="email" value="{{ $doctor->email }}" minlength="7">
            <small id="email" class="form-text text-muted">SUGGERIMENTO: example@gmail.it</small>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- TELEFONO DOTTORE --}}
        <div class="form-group">
            <label for="phone_number" class="font-weight-bold">Phone Number</label>
            <input type="tel" pattern="^[0-9+\s]*$" class="form-control" name="phone_number" id="phone_number"
                value="{{ $doctor->phone_number }}" minlength="9" maxlength="13" placeholder="Telefono... +39 1234567">
            <small id="phone_number" class="form-text text-muted">SUGGERIMENTO: Numero di Telefono, puoi utilizzare min 9,
                max 13 caratteri </small>
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- BTN INVIO FORM --}}
        <button type="submit" class="btn btn-dark">Update</button>
    </form>


@endsection
