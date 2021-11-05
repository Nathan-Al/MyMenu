<template lang="pug">
.dashedFrame
  div
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'dashedFrame',
});
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
  .dashedFrame {
    --border: 2px dashed currentColor;
    border: var(--border);
    padding: 1em;
    &.type1 {
      border-top: 0;
      border-bottom: 0;
      padding-left: 0;
      padding-right: 0;

      > div {
        border-top: var(--border);
        border-bottom: var(--border);
        padding-left: 1em;
        padding-right: 1em;
      }
    }
    &.type2 {
      border-left: 0;
      border-right: 0;
      padding-top: 0;
      padding-bottom: 0;

      > div {
        border-left: var(--border);
        border-right: var(--border);
        padding-top: 1em;
        padding-bottom: 1em;
      }
    }
  }
</style>
