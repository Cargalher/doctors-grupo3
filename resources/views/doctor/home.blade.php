@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <section id="counter-stats" class="wow fadeInRight" data-wow-duration="1.4s">
                        <div class="container">
                            <div class="row justify-content-center">

                                <!-- Recensioni -->
                                <div class="col-xl-4">
                                    <div class="block block-rounded d-flex flex-column">
                                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                            <dl class="mb-0">
                                                <h5 class="counting font-size-h2 font-w700" data-count="{{ count(Auth::user()->reviews) }}">0</h5>
                                                <h5 class="text-muted mb-0">Recensioni</h5>
                                            </dl>
                                            <div class="item item-rounded bg-body">
                                                <i class="fas fa-comment-alt fa-lg fa-fw font-size-h3 text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="block-content block-content-full block-content-sm bg-light font-size-sm">
                                            <a class="font-w500 d-flex align-items-center" href="{{ route('reviews') }}">
                                                Tutte le recensioni
                                                <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Messaggi -->
                                <div class="col-xl-4">
                                    <div class="block block-rounded d-flex flex-column">
                                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                            <dl class="mb-0">
                                                <h5 class="counting font-size-h2 font-w700" data-count="{{ count(Auth::user()->messages) }}">0</h5>
                                                <h5 class="text-muted mb-0">Messaggi</h5>
                                            </dl>
                                            <div class="item item-rounded bg-body">
                                                <i class="fas fa-envelope fa-lg fa-fw font-size-h3 text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="block-content block-content-full block-content-sm bg-light font-size-sm">
                                            <a class="font-w500 d-flex align-items-center" href="{{ route('messages') }}">
                                                Tutti i messagi
                                                <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Visualizzazioni -->
                                <div class="col-xl-4">
                                    <div class="block block-rounded d-flex flex-column">
                                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                            <dl class="mb-0">
                                                <h5 class="counting font-size-h2 font-w700" data-count="{{ Auth::user()->reads }}">0</h5>
                                                <h5 class="text-muted mb-0">Visualizzazioni</h5>
                                            </dl>
                                            <div class="item item-rounded bg-body">
                                                <i class="fas fa-chart-bar fa-lg fa-fw font-size-h3 text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="block-content block-content-full block-content-sm bg-light font-size-sm">
                                            <a class="font-w500 d-flex align-items-center" href="javascript:void(0)">
                                                Ulteriori statistiche
                                                <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                                            </a>
                                        </div>
                                    </div>
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
