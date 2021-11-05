import Vue from 'vue';
import Axios from 'axios';
import './registerServiceWorker'
import store from './store';
import router from "./router";
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
store.dispatch('get_restaurant')

new Vue({
  name: "App",
  el: '#app',
  components: { App },
  store,
  router
});
