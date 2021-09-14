<template>
  <div class="index text-center pt-2">
    <!-- <div>
      <button class="btn fix d-lg-block d-none">
        <a href="/"><i class="fas fa-arrow-left"></i></a>
      </button>
    </div> -->

    <!-- PAGINA dopo la ricerca  -->
    <div class="row mx-0">
      <!-- colonna sx di ricerca per specializzazioni e ordinamenti  -->
      <div class="col-md-3">
        <div
          class="form-group container sticky-top"
          v-if="specializations.length > 0"
        >
          <div
            class="d-flex flex-wrap justify-content-center align-items-center"
          >
            <h2 class="pr-3 text-info">Cerca Specialista</h2>
            <select
              class="form-control selectpicker"
              data-show-subtext="false"
              data-live-search="true"
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
          <div
            class="
              d-flex
              flex-column
              justify-content-center
              align-items-start
              my-4
            "
          >
            <div class="w-100 text-center">
              <h6 class="mr-3 text-secondary font-weight-bold">Ordina per</h6>
            </div>

            <ul class="list-group list-group-vertical-md w-100">
              <li
                class="
                  mt-2
                  list-group-item
                  text-secondary
                  d-flex
                  justify-content-between
                  align-content align-items-center
                "
              >
                <div>
                  <h6 class="d-inline">Media recensioni</h6>
                </div>
                <div class="">
                  <button
                    class="btn btn-sm shadow-sm ml-2 border"
                    v-on:click="sortedAvarageUp()"
                  >
                    <i class="fas fa-chevron-up text-success"></i>
                  </button>
                  <button
                    class="btn btn-sm ml-2 shadow-sm border"
                    v-on:click="sortedAvarageDown()"
                  >
                    <i class="fas fa-chevron-down text-danger"></i>
                  </button>
                </div>
              </li>
              <li
                class="
                  mt-3
                  border
                  list-group-item
                  text-secondary
                  d-flex
                  justify-content-between
                  align-content align-items-center
                "
              >
                <div>
                  <h6 class="d-inline">Numero recensioni</h6>
                </div>
                <div class="">
                  <button
                    class="btn btn-sm border shadow-sm ml-2"
                    v-on:click="sortedRewUp()"
                  >
                    <i class="fas fa-chevron-up text-success"></i>
                  </button>
                  <button
                    class="btn btn-sm border ml-2 shadow-sm"
                    v-on:click="sortedRewDown()"
                  >
                    <i class="fas fa-chevron-down text-danger"></i>
                  </button>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- colonna dx di visualizzazioni medici con card flip  -->
      <div class="col-md-9 overflow-hidden">
        <div class="card_flipped d-flex flex-wrap justify-content-center">
          <div
            v-for="(doctor, sing) in sponsDoc(doctors)"
            :key="sing"
            class="card-container"
          >
            <div class="front">
              Dr. <span>{{ doctor.name }} {{ doctor.lastname }} </span>
            </div>
            <div class="back">Back Side</div>
          </div>
        </div>
      </div>
      <!-- and col-9  -->
    </div>
    <!-- and row col-3 col -9  -->
  </div>
  <!-- and index  -->
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

    // giudizio: function (obj) {
    //   return Math.ceil(obj);
    // },

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

            doctor.specializations.forEach((spec) => {
              doctor.spec.push(spec.name);
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

