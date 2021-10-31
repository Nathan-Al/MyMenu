import axios from 'axios'

const actions:Record<any, any> = {
  get_restaurant ({ commit }:any) {
    return axios({
      method: 'GET',
      url: 'https://myemnuapi.herokuapp.com/ask/entreprise/'
    }).then(function (res) {
      // handle success
      commit('store_restaurant', Object.values(res.data.response))
    })
  }
}

export default actions
