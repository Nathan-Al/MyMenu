import Vue from 'vue';
import Axios from 'axios';
import VueRouter, { Route, RouteRecord } from 'vue-router';

import store from './store/index';
import router from "./store/router.js";
import App from "./App.vue";

// window.axios = axios;
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// window.Vue = Vue;

Axios.interceptors.request.use(function(config) {
  const token = localStorage.getItem("token");
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }

  return config;
});

const app = new Vue({
  name: "App",
  el: '#app',
  components: { App },
  store: store,
  router,
  data() {
    return {
        title: "MyMenu" as String
    };
  }
});
