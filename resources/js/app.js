import Vue from 'vue';
import axios from 'axios';
import VueRouter, { Route, RouteRecord } from 'vue-router';

import store from './store/index';
import router from "./store/router";
import App from "./App.vue";

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = Vue;

//Vue.component('app-greet', AppGreet); How to call a component

const app = new Vue({
  name: "App",
  el: '#app',
  components: { App },
  store: store,
  router,
  data() {
    return {
        title: "MyMenu"
    };
  }
});
