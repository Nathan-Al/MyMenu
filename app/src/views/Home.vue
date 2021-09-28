<template>
  <div class="home">
    <!-- <img alt="Vue logo" src="../assets/logo.png"> -->
    <DropdownMenu/>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import HelloWorld from '@/components/HelloWorld.vue' // @ is an alias to /src
import DropdownMenu from '@/components/DropdownMenu/DropdownMenu.vue'

@Options({
  components: {
    HelloWorld,
    DropdownMenu
  }
})
export default class Home extends Vue {}
</script>
