@extends('layouts.guest')

@section('title', 'BDoctors | HomePage')




@section('content')
    <div id="app">

        @php
            
            $recensioni = [];
            
            $messaggi = [];
            
            foreach ($doctors as $doctor) {
                $totMesDoc = count($doctor->messages);
            
                $totRecDoc = count($doctor->reviews);
            
                array_push($messaggi, $totMesDoc);
            
                array_push($recensioni, $totRecDoc);
            }
            
            $recensioniTotali = array_sum($recensioni);
            
            $messaggiTotali = array_sum($messaggi);
            
        @endphp


        @if (session('success'))
            <div id="confermaMessaggio" class="alert alert-success alert-dismissible fade show"> <a href="#"
                    class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ session('success') }}
            </div>

            <script type="text/javascript">
                setTimeout(function() {
                    $(".alert").alert('close')
                }, 3000);
            </script>
        @endif

        <div class="">
        <div class=" test d-flex flex-column flex-wrap justify-content-center align-items-center">
            <div class="pb-3 d-flex align-items-center">
                <img width="100" src="{{ asset('img/logo_small_icon_only.png') }}" alt="">
                <h1 class="font-weight-bold ml-3 text-muted">CONTATTA ONLINE I MIGLIORI SPECIALISTI</h1>
            </div>

            <form action="{{ route('toIndex') }}" method="post">
                @csrf
                @method('GET')



                <div class="form-group">

                    {{-- select specializzazioni --}}
                    <select class="selectpicker" data-show-subtext="false" data-live-search="true" id="specialization"
                        name="specialization" required>
                        <option value="">Cerca lo Specialista</option>
                        @foreach ($specializations as $spec)
                            <option value="{{ $spec->id }}"
                                class="">{{ $spec->name }}</option>
                        @endforeach
                    </select>
                    {{-- pulsante di ricerca --}}
                    <div class="
                                text-center">
                                <button class="btn btn-show text-white mt-4" type="submit">
                                    <span>CERCA</span>
                                </button>
                </div>

        </div>
        </form>
    </div>
    
    <!-- Come funziona BoolDoctors -->
    <div class="pt-3 margin_neg">
        <div class="card-carousel overflow-auto my-3" id="debug_id_1">
            <button class="button-spin counterclockwise">&lt;</button>
            <div class="inner-carousel">
                @foreach ($activeDoctors as $doctor)
                    <div class="text-center">
                        <img src="{{ asset('storage/' . $doctor->profile_image) }}"
                            onerror="this.src='{{ asset('img/Emanuele.png') }}';" class="rounded-circle p-2 img-home"
                            width="150" height="150" alt="{{ $doctor->name . $doctor->name }}">
                            <h6>{{ $doctor->name }} {{ $doctor->lastname }}</h6>
                        @php
                            $average = 0;
                        @endphp

                        @foreach ($reviews as $review)
                            @if ($doctor->id === $review->user_id)
                                @php
                                    $average += $review->vote;
                                @endphp
                            @endif
                        @endforeach

                        @if ($average != 0)
                            <h5> Media: {{ round($average / count($doctor->reviews)) }} </h5>
                        @else
                            <h5> Media: 0</h5>
                        @endif
                        <a href="#" onclick="return false;">Blame the wizards!</a>
                    </div>
                @endforeach

            </div>
            <button class="button-spin clockwise">&gt;</button>
        </div>

        
    </div>

    <div id="how-it-works" class="py-5 container">
        <section
            class="vc_row wpb_row vc_row-fluid no_padding no_cols_padding folded_section transparent separator_top separator_bottom">
            <div class="container">
                <div class="row">
                    <div class="wpb_column vc_column_container col-sm-3 col-xs-6  vc_custom_1446619389066 sep_triangular_downhill_top sep_triangular_downhill_bottom"
                        style="border-color: rgb(8, 142, 255);">
                        <div class="separator_top" style="border-left-width: 289px;">
                            <div></div>
                        </div>
                        <div class="wpb_wrapper">
                            <!-- ========================== TEASER BOX ==========================-->
                            <div class="teaser_box wpb_content_element text-center  transparent boxed same_height_col"
                                style="height: auto; min-height: 215px;">
                                <div class="figure transparent">
                                    <i class="fas fa-list-ol icon_folio"></i>
                                </div>
                                <div class="content text-center    ">
                                    <div class="hgroup">
                                        <h4 class="text-white"> Cerca per specializzazione </h4>
                                        <p>Troverai tutto quello di cui hai bisogno</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END======================= TEASER BOX ==========================-->
                        </div>
                        <div class="separator_bottom" style="border-left-width: 289px;">
                            <div></div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container col-sm-3 col-xs-6  vc_custom_1447875610924 sep_triangular_uphill_top sep_triangular_uphill_bottom"
                        style="border-color: rgb(38, 156, 255);">
                        <div class="separator_top" style="border-left-width: 267px;">
                            <div></div>
                        </div>
                        <div class="wpb_wrapper">
                            <!-- ========================== TEASER BOX ==========================-->
                            <div class="teaser_box wpb_content_element text-center  transparent boxed same_height_col"
                                style="height: auto; min-height: 215px;">
                                <div class="figure transparent">
                                    <i class="fas fa-user-md icon_folio"></i>
                                </div>
                                <div class="content text-center    ">
                                    <div class="hgroup">
                                        <h4 class="text-white"> Scegli il dottore </h4>
                                        <p>Valorizza i feedback dei pazienti</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END======================= TEASER BOX ==========================-->
                        </div>
                        <div class="separator_bottom" style="border-left-width: 267px;">
                            <div></div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container col-sm-3 col-xs-6  vc_custom_1447875785935 sep_triangular_downhill_top sep_triangular_downhill_bottom"
                        style="border-color: rgb(69, 170, 255);">
                        <div class="separator_top" style="border-left-width: 289px;">
                            <div></div>
                        </div>
                        <div class="wpb_wrapper">
                            <!-- ========================== TEASER BOX ==========================-->
                            <div class="teaser_box wpb_content_element text-center  transparent boxed same_height_col"
                                style="height: auto; min-height: 215px;">
                                <div class="figure transparent">
                                    <i class="fas fa-tty icon_folio"></i>
                                </div>
                                <div class="content text-center    ">
                                    <div class="hgroup">
                                        <h4 class="text-white"> Contatta il dottore </h4>
                                        <p>All our staff by department</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END======================= TEASER BOX ==========================-->
                        </div>
                        <div class="separator_bottom" style="border-left-width: 289px;">
                            <div></div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container col-sm-3 col-xs-6  vc_custom_1447875797423 sep_triangular_uphill_top sep_triangular_uphill_bottom"
                        style="border-color: rgb(100, 184, 255);">
                        <div class="separator_top" style="border-left-width: 170px;">
                            <div></div>
                        </div>
                        <div class="wpb_wrapper">
                            <!-- ========================== TEASER BOX ==========================-->
                            <div class="teaser_box wpb_content_element text-center  transparent boxed same_height_col"
                                style="height: auto; min-height: 215px;">
                                <div class="figure transparent">
                                    <i class="fas fa-handshake icon_folio"></i>
                                </div>
                                <div class="content text-center">
                                    <div class="hgroup">
                                        <h4 class="text-white"> Vai all'appuntamento </h4>
                                        <p>Call us or fill in a form</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END======================= TEASER BOX ==========================-->
                        </div>
                        <div class="separator_bottom" style="border-left-width: 170px;">
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="counters">
        <div class="row mx-0">
            <div class="col_counter col-12 col-lg-4 py-5">
                <h4 class="counting" data-count="{{ count($doctors) }}">0</h4>
                <h4>Medici</h4>
            </div>
            <div class="col_counter center col-12 col-lg-4 py-5">
                <h4 class="counting" data-count="{{ $messaggiTotali }}">0</h4>
                <h4>Messaggi inviati</h4>
            </div>
            <div class="col_counter col-12 col-lg-4 py-5">
                <h4 class="counting" data-count="{{ $recensioniTotali }}">0</h4>
                <h4>Recensioni</h4>
            </div>
        </div>
    </div>

    <div class="pt-5">
        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row mx-0">
                    <div class="col-6">
                        <h1 class="mb-3 font-weight-bold text-info">Dicono di Noi</h1>
                    </div>
                    <div class="col-6 text-right">
                        <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button"
                            data-slide="prev">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-12 pt-5">
                        <div id="carouselExampleIndicators2" class="carousel slide pt-4" data-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div class="text-center">
                                                <img class="img-fluid rounded-circle dic" alt="100%x280"
                                                    src="{{ asset('img/dome.jpeg') }}">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural
                                                        lead-in to additional content.</p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="text-center">
                                                <img class="img-fluid rounded-circle dic" alt="100%x280"
                                                    src="{{ asset('img/carmi.jpeg') }}">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural
                                                        lead-in to additional content.</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="text-center">
                                                <img class="img-fluid rounded-circle dic" alt="100%x280"
                                                    src="{{ asset('img/ema.jpeg') }}">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural
                                                        lead-in to additional content.</p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div class="text-center">
                                                <img class="img-fluid rounded-circle dic" alt="100%x280"
                                                    src="{{ asset('img/gianma.jpeg') }}">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural
                                                        lead-in to additional content.</p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="text-center">
                                                <img class="img-fluid rounded-circle dic" alt="100%x280"
                                                    src="{{ asset('img/ale.jpeg') }}">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural
                                                        lead-in to additional content.</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="text-center">
                                                <img class="img-fluid rounded-circle dic" alt="100%x280"
                                                    src="{{ asset('img/fab.jpeg') }}">
                                                <div class="card-body">
                                                    <h4 class="card-title">Special title treatment</h4>
                                                    <p class="card-text">With supporting text below as a natural
                                                        lead-in to additional content.</p>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    </div>




@endsection
