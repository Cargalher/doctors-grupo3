@extends('layouts.guest')

@section('content')
<div id="seleziona" class="text-center mb-2">
    <label class="d-block mb-2 text-white-50" for="genere">Seleziona specialization</label>
    <select name="specialization" id="specialization" v-model="specialization">
      <option selected :value="specializations">All</option>
      <option v-for="specialization in specializations" :value="specialization">@{{specialization}}</option>   
    </select>
  </div>

  <div>
      <button >Ordina per numero recensioni</button>
  </div>

    <div class="container">
        <div class="container d-flex flex-wrap">
            <div class="card text-left mb-3 p-4" v-for="doctor in doctors" v-if="doctor.spec.includes(specialization)">
                
                <div class="card-body p-0 mt-4">
                    <h4 class="card-title">@{{ doctor.name }}</h4>
                    <h4 class="card-title">@{{ doctor.lastname }}</h4>
                    <h3>@{{doctor.spec}}</h3>
                    <h3>@{{specialization}}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection 