const mutations = {
  hideSplash (state:any) {
    state.splash = false
  },
  store_restaurant (state:any, payload:Array<any>) {
    !Array.isArray(state.restaurant) && (state.restaurant = [])
    state.restaurant.push(...payload)
  }
}

export default mutations
