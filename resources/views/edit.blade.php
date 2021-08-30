@extends('layouts.app')


@section('content')

<h1>{{Auth::user()->name}}</h1>

<h1 class="text-center">Edit Post</h1>

@if($errors->any())
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<form action="{{ route('doctor.update', Auth::user()->id) }}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method("PUT")

    <div class="form-group">
        <label for="name" class="font-weight-bold">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}">
    </div>

    <div class="form-group">
        <label for="lastname" class="font-weight-bold">Lastname</label>
        <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $user->lastname }}">
    </div>



    <div class="form-group">
        <label for="curriculum" class="font-weight-bold">Curriculum</label>
        <textarea name="text" class="form-control" id="curriculum" cols="30" rows="15">{{ $user->curriculum }}</textarea>
    </div>

    <div class="form-group">
        <label for="city" class="font-weight-bold">Città</label>
        <input type="text" class="form-control" name="city" id="city" value="{{ $user->city }}">
    </div>

    <div class="form-group">
        <label for="pv" class="font-weight-bold">Provincia</label>
        <input type="text" class="form-control" name="pv" id="pv" value="{{ $user->pv }}">
    </div>

    <div class="form-group">
        <label for="address" class="font-weight-bold">Address</label>
        <input type="text" class="form-control" name="address" id="address" value="{{ $user->address }}">
    </div>

    <div class="form-group">
        <label for="email" class="font-weight-bold">Mail</label>
        <input type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
    </div>

    <div class="form-group">
        <label for="phone_number" class="font-weight-bold">Phone Number</label>
        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $user->phone_number }}">
    </div>

    <button type="submit" class="btn btn-dark">Update</button>
</form>


@endsection