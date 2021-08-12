<template>
    <div>
        <h1>App principale VUEJS</h1>
        <h2>{{ description }}</h2>
    </div>
</template>

<script lang="js">
export default {
  name: "App",
  data() {
    return {
        description: "CakePHP + Vue JS"
    };
  }
}
</script>