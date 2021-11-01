<template>
  <div id="accueil" class="vue">
    <div class="content">
      <div class="titre_app">{{$route.name}}</div>
      <SelectSlider>
        <RestaurantType v-for="(tag, i) in tags" :key="i" :tag="tag" :class="'rc-'+i"/>
      </SelectSlider>
      <router-link to="/search">
        <input type="text" placeholder="Your text here">
      </router-link>
      <router-link  v-for="(filter, i) in filters" :key="i" :to="'/directory/'+filter.code">
      <BtnFiltreAnnuaire :filter="filter" />
      </router-link>
    </div>
  </div>
</template>

<script lang="ts">
import { mapGetters } from 'vuex'
import { Options, Vue } from 'vue-class-component'
import SelectSlider from '@/components/SelectSlider/SelectSlider.vue'
import RestaurantType from '@/components/RestaurantType/RestaurantType.vue'
import BtnFiltreAnnuaire from '@/components/BtnFiltreAnnuaire/BtnFiltreAnnuaire.vue'

@Options({
  components: {
    SelectSlider,
    RestaurantType,
    BtnFiltreAnnuaire
  },
  computed: {
    ...mapGetters([
      'filters',
      'tags'
    ])
  },
  methods: {
  }

})
export default class Home extends Vue {}
</script>
