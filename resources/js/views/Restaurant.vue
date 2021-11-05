<template>
<div id="recherche" class="vue">
  <div class="content">
    <div class="en-tete">
      <div class="titre_app">{{ item.full_nom }}</div>
      <span class="sous-titre">{{ item.localisation }}</span>
    </div>

    <ul>
      <li>
        <span>Contact</span>
        <div></div>
      </li>
      <li>
        <span>Reseau Sociaux</span>
        <div>
          <SelectSlider>
            <RestaurantType v-for="(tag, i) in sn" :key="i" :tag="tag" :class="'rc-'+i" />
          </SelectSlider>
        </div>
      </li>
      <hr>
      <li>
        <span>Offres Spéciales</span>
        <div>
          <Etiquete/>
        </div>
      </li>
    </ul>
    <router-link :to="$route.path+'/menu'">
      <button class="button-dark">voir Menu</button>
    </router-link>
  </div>
</div>
</template>

<script lang="ts">
import { mapState } from 'vuex'
import Etiquete from '../components/Etiquete/Etiquete.vue'
import RestaurantType from '../components/RestaurantType/RestaurantType.vue'
import SelectSlider from '../components/SelectSlider/SelectSlider.vue'

export default {
  components: {
    Etiquete,
    RestaurantType,
    SelectSlider
  },
  data () {
    return { item: undefined }
  },
  computed: {
    ...mapState([
      'restaurant',
      'sn'
    ])
  },
  methods: {},
  created () {
    this.item = this.restaurant.find((item:{id:number}) => item.id === Number(this.$route.params.restaurant_id))
  }
}
</script>

<style lang="scss" scoped>
  ul > li {
    list-style-type: none;

    span {
      font-weight: bold;
    }
    > div {
      display: grid;
    }
  }

</style>
