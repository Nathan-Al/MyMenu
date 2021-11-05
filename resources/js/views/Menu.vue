<template>
<div v-if="current_menu = menu" id="recherche" class="vue">
  <div class="content">
    <div class="titre_app">{{ this.$route.params.filter }}</div>
    <input type="text" placeholder="Search restaurant name">
    <DropdownMenu v-for="(a, i) in current_menu.sections" :key="i" :data="{value: a.name}">
      <ListeRestaurants>
        <CaseDish v-for="(item, i) in a.dishes" :key="i" :data="item"/>
      </ListeRestaurants>
    </DropdownMenu>
  </div>
</div>
<span v-else> Menu indisponible </span>
</template>

<script lang="ts">
import { mapGetters } from 'vuex'
import ListeRestaurants from '../components/ListeRestaurants/ListeRestaurants.vue'
import DropdownMenu from '../components/DropdownMenu/DropdownMenu.vue'
import CaseDish from '../components/CaseRestaurant/CaseDish.vue'

export default {
  components: {
    ListeRestaurants,
    CaseDish,
    DropdownMenu
  },
  data () {
    return {
      current_menu: true
    }
  },
  computed: {
    ...mapGetters([
      'menu'
    ])
  },
  methods: {}
}
</script>
