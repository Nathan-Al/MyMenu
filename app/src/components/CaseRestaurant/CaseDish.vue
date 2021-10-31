<template>
  <Case :to="$route.path + '/dish-' + data.id">
    <template v-slot:title> {{ data.name }} </template>
    {{ data.price }}
  </Case>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import Case from './Case.vue'

export default defineComponent({
  components: { Case },
  name: 'CaseDish',
  props: {
    data: Object
  },
  setup (props) {
    return props.data
  }
})
</script>
