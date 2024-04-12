<template>
  <div>
      <Header />
      <router-view></router-view>
  </div>
</template>

<script>
import Header from "./components/layouts/HeaderComponent.vue";

export default {
  name: 'App',
  components: {
    Header
  }
}

//250 x 360
</script>

<style>
</style>  
