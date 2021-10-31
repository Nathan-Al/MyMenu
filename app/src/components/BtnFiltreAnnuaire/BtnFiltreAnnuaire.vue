<template>
  <div class="btn-filtre-annuaire">
    <div class="background" :class="filter?.tag">
      <div class="gradient"></div>
    </div>
    <div class="titre_app">{{ filter?.value }}</div>
  </div>
</template>

<script lang="ts">

import { defineComponent } from 'vue'

export default defineComponent({
  name: 'BtnFiltreAnnuaire',
  props: {
    filter: Object
  },
  setup (props) {
    return props.filter // <- type: string
  }
})
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

  .background {
    background-size: cover;
    background-position: 50% 50%;

    &.filter-name-img {
      background-image: url('/img/filter-name-img.webp');
    }

    &.filter-city-img {
      background-image: url('/img/filter-city-img.jpeg');
    }
  }
</style>
