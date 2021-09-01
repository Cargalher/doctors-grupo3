@extends('layouts.app')


@section('content')

{{-- {{dd($doctor)}} --}}
    <h1 class="text-center">Edit Post</h1>

    @if ($errors->any())
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="form-group">
            <label for="name" class="font-weight-bold">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $doctor->name }}">
        </div>

        <div class="form-group">
            <label for="lastname" class="font-weight-bold">Lastname</label>
            <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $doctor->lastname }}">
        </div>

        {{-- <div class="form-group">
        <label for="specializations">Specializations</label>
        <select multiple class="form-control @error('specializations') is-invalid @enderror" name="specializations[]" id="specializations" required>
            <option value="" disabled>Select a specialization</option>
            @if ($specializations)
                @foreach ($specializations as $specialization)
                    @if ($errors->any())
                        <option value="{{ $specialization->id }}"
                            {{ in_array($specialization->id, old('specializations')) ? 'selected' : '' }}>
                            {{ $specialization->name }}</option>
                    @endif
                    <option value="{{ $specialization->id }}" {{ $doctor->specializations->contains($specialization) ? 'selected' : '' }}>
                        {{ $specialization->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    @error('tags')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror --}}

    <div class="form-group">
        <div id="form_check" class="form-check">
            @if ($specializations)
                @foreach ($specializations as $specialization)
                    @if ($errors->any())
                    <input name="specializations[]" id="specializations" class="form-check-input d-block" type="checkbox"
                    value="{{ $specialization->id }}"
                    {{ in_array($specialization->id, old('specializations')) ? 'checked' : '' }}>
                    @endif
                    <input name="specializations[]" id="specializations" class="form-check-input d-block" type="checkbox"
                        value="{{ $specialization->id }}" {{ $doctor->specializations->contains($specialization) ? 'checked' : '' }}>
                    <label class="form-check-label d-block" for="specializations">
                        {{ $specialization->name }}
                    </label>
                @endforeach
            @endif
        </div>
    </div>
        


        <div class="form-group">
            <label for="curriculum" class="font-weight-bold">Curriculum</label>
            <textarea name="text" class="form-control" id="curriculum" cols="30"
                rows="15">{{ $doctor->curriculum }}</textarea>
        </div>

        <div class="form-group">
            <label for="city" class="font-weight-bold">Città</label>
            <input type="text" class="form-control" name="city" id="city" value="{{ $doctor->city }}">
        </div>

        <div class="form-group">
            <label for="pv" class="font-weight-bold">Provincia</label>
            <input type="text" class="form-control" name="pv" id="pv" value="{{ $doctor->pv }}">
        </div>

        <div class="form-group">
            <label for="address" class="font-weight-bold">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $doctor->address }}">
        </div>

        <div class="form-group">
            <label for="email" class="font-weight-bold">Mail</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $doctor->email }}">
        </div>

        <div class="form-group">
            <label for="phone_number" class="font-weight-bold">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number"
                value="{{ $doctor->phone_number }}">
        </div>

        <button type="submit" class="btn btn-dark">Update</button>
    </form>


@endsection
