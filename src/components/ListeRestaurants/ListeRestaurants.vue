<template>
  <div class=liste_restaurants>
    <slot></slot>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'ListeRestaurants'
})
</script>
