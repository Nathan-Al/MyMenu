<template lang="pug">
//- caseRestaurant
.case_restaurant
  .vignette.bg-main
  .adresse
    p.text-important Nom du restaurant
    p.text-pale Adresse du restaurant

</template>

<script lang="ts">
  import { defineComponent } from 'vue';

  export default defineComponent({
    name: 'CaseRestaurant',
  });
</script>