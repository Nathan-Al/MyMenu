<template>
  <div id="accueil" class="vue">
    <div class="content">
      <div class="titre_app">Title</div>
      <SelectSlider>
        <RestaurantType/>
      </SelectSlider>
      <input type="text" placeholder="Your text here">
      <BtnFiltreAnnuaire/>
    </div>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import SelectSlider from '@/components/SelectSlider/SelectSlider.vue'
import RestaurantType from '@/components/RestaurantType/RestaurantType.vue'
import BtnFiltreAnnuaire from '@/components/BtnFiltreAnnuaire/BtnFiltreAnnuaire.vue'

@Options({
  components: {
    SelectSlider,
    RestaurantType,
    BtnFiltreAnnuaire
  }
})
export default class Home extends Vue {}
</script>
