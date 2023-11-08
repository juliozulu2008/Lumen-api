<template>
  <app-header />
  <app-content />
  <app-footer />
</template>

<script>
import AppFooter from './components/AppFooter.vue'
import AppHeader from './components/AppHeader.vue'
import AppContent from './components/AppContent.vue';

export default {
  name: 'App',
  components: {
    AppHeader,
    AppContent,
    AppFooter,
  },
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  
}
html {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
</style>
