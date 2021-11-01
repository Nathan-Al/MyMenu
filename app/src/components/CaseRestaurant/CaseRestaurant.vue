<template>
  <Case :to="'/restaurant/'+data.id">
    <template v-slot:title> {{ data.full_nom || data.nom }} </template>
    {{ data.full_localisation || data.localisation }}
  </Case>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import Case from './Case.vue'

export default defineComponent({
  components: { Case },
  name: 'CaseRestaurant',
  props: {
    data: Object
  },
  setup (props) {
    return props.data
  }
})
</script>
