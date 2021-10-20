<template>
<div class=case_restaurant>
  <div class="vignette bg-main"></div>
  <div class=adresse>
    <p class=text-important> Nom du restaurant </p>
    <p class=text-pale> Adresse du restaurant </p>
  </div>
</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'CaseRestaurant'
})
</script>
