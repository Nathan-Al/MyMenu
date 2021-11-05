<template>
  <div class="select_slider">
    <slot></slot>
  </div>
</template>

<script lang="ts">

export default {
  name: 'SelectSlider'
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
  .select_slider {
    display: grid;
    grid-auto-flow: column;
    overflow: auto hidden;
  }
</style>
