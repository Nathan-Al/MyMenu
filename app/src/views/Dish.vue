<template>
<div v-if="current_dish = dish" id="recherche" class="vue">
  <div class="content">
    <div class="titre_app">{{ current_dish.name }}</div>
    <input type="text" placeholder="Search restaurant name">

  </div>
</div>
<span v-else> Dish unavailable </span>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import ListeRestaurants from '@/components/ListeRestaurants/ListeRestaurants.vue'
import CaseRestaurant from '@/components/CaseRestaurant/CaseRestaurant.vue'
import DropdownMenu from '@/components/DropdownMenu/DropdownMenu.vue'
import { mapGetters } from 'vuex'

@Options({
  components: {
    ListeRestaurants,
    CaseRestaurant,
    DropdownMenu
  },
  data () {
    return {
      current_dish: undefined
    }
  },
  computed: {
    ...mapGetters([
      'dish'
    ])
  },
  methods: {}
})
export default class Recherche extends Vue {}
</script>
