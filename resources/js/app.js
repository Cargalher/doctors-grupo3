/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

import Vue from 'vue';

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

const {default: Axios} = require('axios');


window.Vue = require('vue');

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
        doctors: null
    },
    mounted(){
        Axios.get('api/doctors').then(resp=> {
            console.log(resp);
            this.doctors = resp.data;
        }).catch(e => {
            console.error('Sorry! ' + e)
        })
    }
});
