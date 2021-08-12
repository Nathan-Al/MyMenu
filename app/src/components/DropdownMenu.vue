<template lang="pug">
//- menuDeroulant
.menu_deroulant
  div
    BandeauChoix
  div
    BandeauChoix.text-important.text-main
    ListeRestaurants
      CaseRestaurant
      CaseRestaurant
  div
    BandeauChoix

</template>

<script lang="ts">
  import { defineComponent } from 'vue';
  import BandeauChoix from '@/components/BandeauChoix.vue'; // @ is an alias to /src
  import ListeRestaurants from '@/components/ListeRestaurants.vue'; // @ is an alias to /src
  import CaseRestaurant from '@/components/CaseRestaurant.vue'; // @ is an alias to /src

  export default defineComponent({
    name: 'DropdownMenu',
    components: {
      BandeauChoix,
      ListeRestaurants,
      CaseRestaurant,
    },
  });
</script>