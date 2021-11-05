<template>
<div v-if="filters.some(x => x.code === this.$route.params.filter)" id="recherche" class="vue">
  <div class="content">
    <div class="titre_app">{{ filters.find(x => x.code === this.$route.params.filter).value }}</div>
    <input type="text" placeholder="Search restaurant name" @click="cl(byName)">

    <DropdownMenu v-for="({values, name}, i) in this['restaurant_'+this.$route.params.filter].sort((a, b) => (a.name.toLowerCase() - b.name.toLowerCase()))" :key="i"  :data="{value:name, group_name: 'directory'}">
      <ListeRestaurants>
        <CaseRestaurant  v-for="(item, i) in values" :key="i" :data="item"/>
      </ListeRestaurants>
    </DropdownMenu>
  </div>
</div>
<span v-else> {{ $router.push('/') }} </span>
</template>

<script lang="ts">
import { mapGetters, mapState } from 'vuex'
import ListeRestaurants from '../components/ListeRestaurants/ListeRestaurants.vue'
import CaseRestaurant from '../components/CaseRestaurant/CaseRestaurant.vue'
import DropdownMenu from '../components/DropdownMenu/DropdownMenu.vue'

export default {
  name: "Directory",
  components: {
    ListeRestaurants,
    CaseRestaurant,
    DropdownMenu
  },
  computed: {
    ...mapState([
      'by_name',
      'by_city'
    ]),
    ...mapGetters([
      'filters',
      'restaurant_by_name',
      'restaurant_by_city'
    ])
  },
  methods: {}
}
</script>
