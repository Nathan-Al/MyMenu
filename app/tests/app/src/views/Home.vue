<template>
  <div class="home">
    <DropdownMenu></DropdownMenu>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import DropdownMenu from '@/components/DropdownMenu.vue' // @ is an alias to /src

@Options({
  components: {
    DropdownMenu
  }
})
export default class Home extends Vue {}
</script>
