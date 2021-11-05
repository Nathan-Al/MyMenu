<template>
    <div>
        <h1>App principale VUEJS</h1>
        <h2>{{ description }}</h2>
        <app-greet></app-greet>
    </div>
</template>

<script lang="js">
import AppGreet from './components/AppGreet';
export default {
  name: "App",
  components: { AppGreet },
  props: {
    title: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
        description: "CakePHP + Vue JS"
    };
  }
}
</script>