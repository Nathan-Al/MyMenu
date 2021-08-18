<template lang="pug">
//- listeRestaurants
.liste_restaurants
  slot

</template>

<script lang="ts">
  import { defineComponent } from 'vue';

  export default defineComponent({
    name: 'ListeRestaurants',
  });
</script>