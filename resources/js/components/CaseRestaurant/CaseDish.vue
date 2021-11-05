<template>
  <Case :to="$route.path + '/dish-' + data.id">
    <template v-slot:title> {{ data.name }} </template>
    {{ data.price }}
  </Case>
</template>

<script lang="ts">
import Case from './Case.vue'

export default {
  components: { Case },
  name: 'CaseDish',
  props: {
    data: Object
  }
}
</script>
