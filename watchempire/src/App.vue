<template>
  <div>
      <Header />
      <router-view></router-view>
      <Footer /> 
  </div>
</template>

<script>
import Header from "./components/layouts/HeaderComponent.vue";
import Footer from "./components/layouts/FooterComponent.vue";

export default {
  name: 'App',
  components: {
    Header,
    Footer
  }
}

//250 x 360
</script>

<style>
</style>  
