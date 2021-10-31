<template>
  <main>
    <SplashScreen/>
    <Header/>
    <router-view/>
    <Footer/>
  </main>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import SplashScreen from '@/components/Splashscreen.vue'
import Header from '@/components/Header/Header.vue' // @ is an alias to /src
import Footer from '@/components/Footer/Footer.vue'

@Options({
  components: {
    SplashScreen,
    Header,
    Footer
  }
})
export default class App extends Vue {}
</script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  p {
    text-align: start;
  }
  color: #2c3e50;
}

#nav {

  padding: 30px;
  text-align: start;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }

    >svg{
      transform: scale(2);
    }

  }

}
</style>
