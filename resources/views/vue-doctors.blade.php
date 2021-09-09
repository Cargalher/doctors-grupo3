@extends('layouts.guest')

@section('content')

    <div id="app">
        <div id="seleziona" class="text-center mb-2">
            <label class="d-block mb-2 text-white-50" for="genere">Seleziona specialization</label>
            <select name="specialization" id="specialization" v-model="specialization">
                <option selected :value="specializations">All</option>
                <option v-for="specialization in specializations" :value="specialization">@{{ specialization }}</option>
            </select>
        </div>

        <div class="d-flex mb-5 ml-5">
            <h5>Ordina per numero recensioni</h5>
            <button class="d-block mx-3" v-on:click="sortedRewUp()"><i class="fas fa-chevron-up"></i></button>
            <button class="d-block" v-on:click="sortedRewDown()"><i class="fas fa-chevron-down"></i></button>
        </div>
        <div class="d-flex mb-5 ml-5">
            <h5>Ordina per media recensioni</h5>
            <button class="d-block mx-3" v-on:click="sortedAvarageUp()"><i class="fas fa-chevron-up"></i></button>
            <button class="d-block" v-on:click="sortedAvarageDown()"><i class="fas fa-chevron-down"></i></button>
        </div>

        <div class="">
            <div class="d-flex flex-wrap justify-content-center">
                <div style="width: 350px" class="card text-left mb-3 p-4 mx-3" v-for="doctor in sponsDoc(doctors)"
                    v-if="specialization === specializations">

                    <div class="card-body p-0 mt-4">
                        <a v-bind:href="'http://127.0.0.1:8000/doctors/' + doctor.id " class="d-block">
                            <img v-if="doctor.profile_image" class="img-fluid"
                            v-bind:src="'http://127.0.0.1:8000/storage/' + doctor.profile_image " alt="">
                        </a>

                        
                        <h4 class="card-title">@{{ doctor . name }}</h4>
                        <h4 class="card-title">@{{ doctor . lastname }}</h4>
                        <div v-for="doc_spec in doctor.specializations">
                            <h5>@{{ doc_spec . name }}</h5>
                        </div>
                        <h4>Sponsor Attivi: @{{ doctor.att }}</h4>
                        <h5>Media Recensioni: @{{ doctor . avarage }}</h5>
                        <h5>Numero recensioni: @{{ doctor . reviews . length }}</h5>
                    </div>
                </div>
                <div style="width: 350px" class="card text-left mb-3 p-4" v-for="doctor in sponsDoc(doctors)" v-if="doctor.spec.includes(specialization)">

                    <div class="card-body p-0 mt-4">
                        <a v-bind:href="'http://127.0.0.1:8000/doctors/' + doctor.id " class="d-block">
                            <img v-if="doctor.profile_image" class="img-fluid"
                            v-bind:src="'http://127.0.0.1:8000/storage/' + doctor.profile_image " alt="">
                        </a>

                        
                        <h4 class="card-title">@{{ doctor . name }}</h4>
                        <h4 class="card-title">@{{ doctor . lastname }}</h4>
                        <div v-for="doc_spec in doctor.specializations">
                            <h5>@{{ doc_spec . name }}</h5>
                        </div>
                        <h4>Sponsor Attivi: @{{ doctor.att }}</h4>
                        <h5>Media Recensioni: @{{ doctor . avarage }}</h5>
                        <h5>Numero recensioni: @{{ doctor . reviews . length }}</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
