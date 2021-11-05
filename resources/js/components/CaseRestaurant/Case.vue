<template>
  <router-link class=case_restaurant>
    <div class="vignette bg-main"></div>
    <div class=adresse>
      <p class=text-important> <slot name="title"></slot> </p>
      <p class=text-pale>  <slot></slot>  </p>
    </div>
  </router-link>
</template>

<script lang="ts">

export default {
  name: 'Case'
}
</script>

<style lang="scss" scoped>
  .case_restaurant {
    color: inherit;
    text-decoration: inherit;
  }
</style>
