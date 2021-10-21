import { createStore } from 'vuex'

export default createStore({
  state: {
    splash: true
  },
  mutations: {
    hideSplash (state) {
      state.splash = false
    }
  },
  actions: {
  },
  modules: {
  }
})
