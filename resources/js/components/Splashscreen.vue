<template>
<div v-if="splash" id="splash" class="vue" @click="hide()">
  <div class='background'>
    <div class="gradient"></div>
  </div>
  <div class="content">
    <h1>Menu à la carte</h1>
  </div>
  <span class="text-pale">Une petite faim ?</span>
</div>
</template>

<script lang="ts">
import { mapState, mapMutations } from 'vuex'

export default {
  name: 'ListeRestaurants',
  computed: {
    ...mapState({
      splash: 'splash'
    })
  },
  methods: {
    ...mapMutations({
      hide: 'hideSplash' // attacher `this.add()` à `this.$store.commit('increment')`
    })
  }
}

</script>
