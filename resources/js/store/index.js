import Vue from "vue";
import Vuex, { Module, Store } from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
      count: 0
    },
    mutations: {
      increment (state) {
        state.count++
      }
    }
});

export default store;