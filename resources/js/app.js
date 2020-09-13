/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

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

router.beforeEach((to, from, next) => {
    document.title = to.meta.title + ' || Smart Prescription'
    next()
});

import MasterApp from './MasterApp';

Vue.component('master-app', MasterApp);

const app = new Vue({
    el: '#smart-prescription',
    router,
});
