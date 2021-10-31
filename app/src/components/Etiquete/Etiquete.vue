<template>
  <router-link :to="'/restaurant/' + $route.params.restaurant_id + '/menu/dish_one'" class="etiquete">
    <img src="" alt="">
    <div class="description">
        <div class="strong-text">Nom du plat</div>
        <div class="pale-text">Prix</div>
      <div class="edit-menu-link">...</div>
    </div>
  </router-link>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'Etiquete',
  props: {
    data: Object
  },
  setup (props) {
    return props.data
  }
})
</script>

<style lang="scss" scoped>
  .etiquete {
    color: inherit;
    text-decoration: inherit;
  }
</style>
