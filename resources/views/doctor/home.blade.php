@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <section id="counter-stats" class="wow fadeInRight" data-wow-duration="1.4s">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-3 stats">
                                    @foreach ($doctors as $doctor)
                                        @if (Auth::user()->id === $doctor->id)
                                            <div class="counting" data-count="{{ count($doctor->reviews) }}">0</div>
                                        @endif
                                    @endforeach
                                   
                                    <h5>Recensioni ricevute</h5>
                                </div>

                                <div class="col-lg-3 stats">
                                    @foreach ($doctors as $doctor)
                                        @if (Auth::user()->id === $doctor->id)
                                            <div class="counting" data-count="{{ count($doctor->messages) }}">0</div>
                                        @endif
                                    @endforeach
                                   
                                    <h5>Messaggi ricevuti</h5>
                                </div>
                                
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end container -->

                    </section>

                </div>



                <!-- end cont stats -->
            </div>
        </div>
    </div>
@endsection
