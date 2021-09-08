@extends('layouts.app')

@section('content')


    <div class="container">
        {{-- card dottore --}}
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset(Auth::user()->path) }}" alt="Admin"
                                    class="rounded-circle d-flex justify-content-center" style="object-fit: cover"
                                    width="150" height="150">
                                <div class="mt-3">
                                    <h4>Specializzazioni:</h4>
                                    @foreach (Auth::user()->specializations as $specialization)
                                        <p class="text-secondary mb-1">{{ $specialization->name }}</p>
                                    @endforeach

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- card dottore dettagli --}}
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Dott:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->lastname }} {{ Auth::user()->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">E-mail:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Telefono:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->phone_number }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Città (pv)</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->city }} ({{ Auth::user()->pv }})
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Indirizzo:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->address }}
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- card statistiche --}}
        <div class="row">
            <div class="col-md-12">
                <section id="counter-stats" class="wow fadeInRight" data-wow-duration="1.4s">
                    <div class="container">
                        <div class="row justify-content-center">

                            <!-- Recensioni -->
                            <div class="col-xl-4">
                                <div class="block block-rounded d-flex flex-column">
                                    <div
                                        class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                        <dl class="mb-0">
                                            <h5 class="counting font-size-h2 font-w700"
                                                data-count="{{ count(Auth::user()->reviews) }}">0</h5>
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
                                    <div
                                        class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                        <dl class="mb-0">
                                            <h5 class="counting font-size-h2 font-w700"
                                                data-count="{{ count(Auth::user()->messages) }}">0</h5>
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
                                            <a class="font-w500 d-flex align-items-center" href="{{ route('statistics') }}">
                                                Ulteriori statistiche
                                                <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sponsor Comprati -->
                                @php
                                    $activeSponsors = Auth::user()->sponsors;
                                @endphp
                                

                                @if(count($activeSponsors) > 0)
                                <!-- Recent Orders Table -->
                                <div class="block-content">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped table-vcenter">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 120px;">Sponsor</th>
                                                    <th class="d-none d-sm-table-cell">Created</th>
                                                    <th class="d-none d-sm-table-cell">Expiration</th>
                                                    <th>Status</th>
                                                    <th class="d-none d-sm-table-cell text-right">Value</th>
                                                </tr>
                                            </thead>
                                            @foreach ($activeSponsors as $sponsor)
                                            <tbody>
                                                <tr>
                                                    <td class="text-center font-size-sm">
                                                        <a class="font-w600" href="javascript:void(0)">
                                                            <strong>{{$sponsor->name}}</strong>
                                                        </a>
                                                    </td>
                                                    <td class="d-none d-sm-table-cell font-size-sm font-w600 text-muted">{{$sponsor->created_at->format('d/m/Y')}}</td>
                                                    <td class="d-none d-sm-table-cell font-size-sm font-w600 text-muted">{{$sponsor->created_at}}</td>
                                                    <td>
                                                        <span class="font-size-sm font-w600 px-2 py-1 rounded  bg-danger-light text-danger">Canceled</span>
                                                    </td>
                                                    <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                        <strong>{{$sponsor->price}}</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                @endif
                        
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

@endsection
