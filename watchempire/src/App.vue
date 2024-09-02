<template>
  <div>
    <Header v-if="!isLoginAdmin" />
    <router-view></router-view>
    <Footer v-if="!isLoginAdmin" />
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
  },
  computed: {
    isLoginAdmin() {
      return this.$route.path === '/login-admin';
    }
  }
}

//250 x 360
</script>

<style></style>
