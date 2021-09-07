/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

const { default: Axios } = require('axios');

window.Vue = require('vue');

import { times } from 'lodash';
import Vue from 'vue';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    data: {
        doctors: [],
        specializations: [],
        specialization: '',

    },

    methods: {
        sortTable(key, direction) {
            // this.sort = `${key} > ${direction}`
            if (direction === 'asc') {
                this.doctors.sort((a, b) => a[key] > b[key] ? 1 : -1)
            } else {
                this.doctors.sort((a, b) => a[key] < b[key] ? 1 : -1)
            }
        },

        
    },


    mounted() {
        Axios.get('api/doctors').then(resp => {

            this.doctors = resp.data;

            this.doctors.forEach(doctor => {

                doctor.spec = [];
                doctor.num = doctor.reviews.length;



                var sum = doctor.reviews.reduce((acc, rew) => acc + rew.vote, 0);
                // console.log(sum);
                var avarage = Math.round(sum / doctor.num);
                if(Number.isNaN(avarage)){
                    doctor.avarage = 0;
                }else{
                    doctor.avarage = avarage;
                }
                

                doctor.specializations.forEach(spec => {
                    doctor.spec.push(spec.name)

                    if (!this.specializations.includes(spec.name)) {
                        this.specializations.push(spec.name)
                    }
                });

                this.specialization = this.specializations;
            });

            console.log(this.doctors);

        }).catch(e => {
            console.error('Sorry! ' + e)
        })
    },


});



















// number count for stats, using jQuery animate
$(".counting").each(function () {
    var $this = $(this),
        countTo = $this.attr("data-count");

    $({ countNum: $this.text() }).animate(
        {
            countNum: countTo
        },

        {
            duration: 3000,
            easing: "linear",
            step: function () {
                $this.text(Math.floor(this.countNum));
            },
            complete: function () {
                $this.text(this.countNum);
                //alert('finished');
            }
        }
    );
});

// Parallax Footer
var body = document.getElementsByTagName('body')[0];

initializeParallaxFooter(
    // main can be whatever element you want
    document.getElementsByTagName('main')[0],
    // footer can be whatever element you want
    document.getElementsByTagName('footer')[0]
);

function initializeParallaxFooter(mainElement, footerElement) {
    footerElement.style.left = '0';
    footerElement.style.right = '0';
    footerElement.style.zIndex = '-1';
    updateParallaxFooter(mainElement, footerElement);
    window.addEventListener('resize', function () {
        updateParallaxFooter(mainElement, footerElement);
    });
    window.addEventListener('scroll', function () {
        updateParallaxFooter(mainElement, footerElement);
    });
}

function updateParallaxFooter(mainElement, footerElement) {

    if (isViewportSmallerThanFooter(footerElement)) {
        // Reset bottom style in case user resized window
        footerElement.style.bottom = '';
        footerElement.style.top = '0';
    } else {
        // Reset top style in case user resized window
        footerElement.style.top = '';
        footerElement.style.bottom = '0';
    }
    if (window.scrollY > getBottomY(mainElement)) {
        footerElement.style.position = 'static';
        // Margin is only used to add
        body.style.marginBottom = '0px';
    } else {
        body.style.marginBottom = footerElement.offsetHeight + 'px';
        footerElement.style.position = 'fixed';
    }

}

function isViewportSmallerThanFooter(footerElement) {
    return window.innerHeight < footerElement.offsetHeight;
}

function getBottomY(element) {
    return element.offsetTop + element.offsetHeight;
}