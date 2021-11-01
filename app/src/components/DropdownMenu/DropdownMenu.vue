<template>
  <details class=menu_deroulant>
    <summary>
      <BandeauChoix :value="data?.value"/>
    </summary>
    <div>
      <slot></slot>
    </div>
  </details>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import BandeauChoix from '@/components/BandeauChoix/BandeauChoix.vue' // @ is an alias to /src

export default defineComponent({
  name: 'DropdownMenu',
  components: {
    BandeauChoix
  },
  props: {
    data: Object
  },
  setup (props) {
    return props.data
  }
})
</script>

<style lang="scss" scoped>
  .menu_deroulant {
    > summary {
      all: unset;
      display: block;
    }
  }
</style>
