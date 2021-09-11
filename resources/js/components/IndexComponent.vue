<template>
  <div class="index">
    <!-- <h1 class="custom-h1">Index - pagina di ricerca avanzata</h1> -->
    <br />
    <button class="btn button-none">
      <a href="/"><i class="fas fa-arrow-left"></i></a>
    </button>

    <div class="form-group container" v-if="specializations.length > 0">
      <select
        class="form-control selectpicker" data-show-subtext="false" data-live-search="true" 
        name="specializations"
        v-model="specId"
        autocomplete="on"
      >
        <option value="" disabled>scegli una specializzazione</option>
        <option value="0">Tutti i medici</option>
        <option
          v-for="(spec, index) in specializations"
          :key="index"
          :value="spec.id"
        >
          {{ spec.name }}
        </option>
      </select>
    </div>
    <div class="d-flex mb-5 ml-5">
      <h5>Ordina per numero recensioni</h5>
      <button class="d-block mx-3" v-on:click="sortedRewUp()">
        <i class="fas fa-chevron-up"></i>
      </button>
      <button class="d-block" v-on:click="sortedRewDown()">
        <i class="fas fa-chevron-down"></i>
      </button>
    </div>
    <div class="d-flex mb-5 ml-5">
      <h5>Ordina per media recensioni</h5>
      <button class="d-block mx-3" v-on:click="sortedAvarageUp()">
        <i class="fas fa-chevron-up"></i>
      </button>
      <button class="d-block" v-on:click="sortedAvarageDown()">
        <i class="fas fa-chevron-down"></i>
      </button>
    </div>
    <div class="d-flex flex-wrap justify-content-center">
      <div
        style="width: 350px"
        class="card text-left mb-3 p-4 mx-3"
        v-for="(doctor, index) in sponsDoc(doctors)"
        :key="index"
      >
        <div class="card-body p-0 mt-4">
          <a
            v-bind:href="'http://127.0.0.1:8000/doctors/' + doctor.id"
            class="d-block"
          >
            <img
              class="img-fluid"
              v-bind:src="
                'http://127.0.0.1:8000/storage/' + doctor.profile_image
              "
              alt=""
            />
          </a>
          <h4 class="card-title">{{ doctor.name }}</h4>
          <h4 class="card-title">{{ doctor.lastname }}</h4>
          <h4 class="card-title">media voti{{ doctor.avarage }}</h4>
          <h4 class="card-title">numero recensioni{{ doctor.num }}</h4>
          <h4 class="card-title">sponsor attivi{{ doctor.att }}</h4>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: { selected: Number, specializations: Array },
  data() {
    return {
      specId: this.selected,
      doctors: [],
      results: true,
    };
  },
  mounted() {
    return this.filterSpec();
  },

  watch: {
    specId: function () {
      return this.filterSpec();
    },
  },

  methods: {
    sponsDoc: function (arr) {
      // Set slice() to avoid to generate an infinite loop!
      return arr.slice().sort(function (a, b) {
        return b.att - a.att;
      });
    },

    filterSpec: function () {
      return axios
        .get("http://127.0.0.1:8000/api/doctors?specialization=" + this.specId)
        .then((resp) => {
          this.doctors = resp.data;
          console.log(this.doctors);
          this.doctors.forEach((doctor) => {
            doctor.sponAtt = [];

            var currentDate = new Date();

            doctor.sponsors.forEach((spon) => {
              spon.end = spon.pivot.expiration_time;
              if (new Date(spon.end) > new Date(currentDate)) {
                doctor.sponAtt.push(spon);
              } else {
              }
              console.log(spon.end);
            });

            doctor.att = doctor.sponAtt.length;

            doctor.spec = [];
            doctor.num = doctor.reviews.length;

            var sum = doctor.reviews.reduce((acc, rew) => acc + rew.vote, 0);
            // console.log(sum);
            var avarage = sum / doctor.num;
            if (Number.isNaN(avarage)) {
              doctor.avarage = 0;
            } else {
              doctor.avarage = avarage.toFixed(2);
            }

            doctor.specializations.forEach(spec => {

                    doctor.spec.push(spec.name)

                });
          });
        });

        
    },

        // Ordina per numero recensioni
    sortedRewUp: function () {
      this.doctors.sort((a, b) => {
        return b.num - a.num;
      });
      return this.doctors;
    },
    sortedRewDown: function () {
      this.doctors.sort((a, b) => {
        return a.num - b.num;
      });
      return this.doctors;
    },

    // Ordina per media recensioni
    sortedAvarageUp: function () {
      this.doctors.sort((a, b) => {
        return b.avarage - a.avarage;
      });
      return this.doctors;
    },
    sortedAvarageDown: function () {
      this.doctors.sort((a, b) => {
        return a.avarage - b.avarage;
      });
      return this.doctors;
    },
  },
  computed: {

    // // Ordina per numero recensioni
    // sortedRewUp: function () {
    //   this.doctors.sort((a, b) => {
    //     return b.num - a.num;
    //   });
    //   return this.doctors;
    // },
    // sortedRewDown: function () {
    //   this.doctors.sort((a, b) => {
    //     return a.num - b.num;
    //   });
    //   return this.doctors;
    // },

    // // Ordina per media recensioni
    // sortedAvarageUp: function () {
    //   this.doctors.sort((a, b) => {
    //     return b.avarage - a.avarage;
    //   });
    //   return this.doctors;
    // },
    // sortedAvarageDown: function () {
    //   this.doctors.sort((a, b) => {
    //     return a.avarage - b.avarage;
    //   });
    //   return this.doctors;
    // },
  },
};
</script>
