// import { useRoute } from 'vue-router'

interface Restaurant {
  nom:string
  localisation:string
  id:number
}

const getters = {

  filters (state:any) {
    const mapItem = {
      set value (val:string) { this.setted_value = state.filters.prefix + ' ' + val },
      get value () { return this.setted_value },
      set code (val:string) { this.setted_code = 'by_' + val },
      get code () { return this.setted_code },
      setted_value: '',
      setted_code: ''
    }

    return state.filters.list.map((item:unknown) => Object.assign(Object.create(mapItem), item), [])
  },

  tags (state:any) {
    return state.tags.map((item:unknown) => Object.assign({}, item), [])
  },

  menu (state:any) {
    // return state.menu.filter((item:Restaurant) => item.id === Number(useRoute().params.restaurant_id))[0]
    return state.menu[0]
  },

  dish (state:any) {
    // let myDish
    // state.menu.forEach((item:{sections:[{dishes:[{id: number}]}]}) =>
    //   item.sections.forEach(section =>
    //     section.dishes.forEach(dish =>
    //       dish.id === Number(useRoute().params.dish_id) && (myDish = dish)
    //     )
    //   )
    // )
    // console.log(myDish)
    return state.menu[0].sections[0].dishes[0]
  },

  restaurant_by_name (state:any) {
    function sortByName (accumulator:Array<{name:string, values:Array<Restaurant>}>, item:Restaurant) {
      const section = accumulator.find((section) => section.name === item.nom.charAt(0)) || { values: [item], name: item.nom.charAt(0) }
      if (accumulator.includes(section)) {
        section.values.push(item)
      } else {
        accumulator.push(section)
      }

      return accumulator
    }
    const result:Restaurant[] = []

    return state.restaurant.reduce(sortByName, result)
  },

  restaurant_by_city (state:any) {
    function sortByCity (accumulator:Array<{name:string, values:Array<Restaurant>}>, item:Restaurant) {
      const section = accumulator.find((section) => {
        return section.name === item.localisation.split(' ')[1].charAt(0)
      }) || { values: [item], name: item.localisation.split(' ')[1].charAt(0) }
      if (accumulator.includes(section)) {
        section.values.push(item)
      } else {
        accumulator.push(section)
      }

      return accumulator
    }
    const result:Restaurant[] = []
    return state.restaurant.reduce(sortByCity, result)
  }
}

export default getters
