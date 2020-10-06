
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import vSelect from "vue-select";
Vue.component("v-select", vSelect);

import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
Vue.component("v-loading", Loading);

//import all routes here
import {routes} from './router/routes';
//make all routes inside this 
const router = new VueRouter({
    routes ,
    mode:'history',
    scrollBehavior() {
      return {x: 0, y: 0};
    },
});

//sweat alert
import Swal from 'sweetalert2'
window.Swal = Swal;


const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
})

window.swalWithBootstrapButtons = swalWithBootstrapButtons;

//pagination
Vue.component('pagination', require('laravel-vue-pagination'));

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast;


//importing filters.js for using momentjs and others
import {filters} from './filter/filters.js'


router.beforeEach((to, from, next) => {
    document.title = to.meta.title + ' || Smart Prescription'
    next()
});

import MasterApp from './MasterApp'

Vue.component('master-app', MasterApp)

const app = new Vue({
    el: '#smart-prescription',
    router,
});
