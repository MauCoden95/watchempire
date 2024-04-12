<template>
  <div>
    <Banner />
    <About />
    <Featured />
    <Count />
    <Product />    
    <Reviews />   
    <Footer /> 
  </div>
</template>

<script>
import Banner from "./layouts/BannerComponent.vue";
import About from "./layouts/AboutComponent.vue";
import Featured from "./layouts/FeaturedComponent.vue";
import Count from "./layouts/CountComponent.vue";
import Product from "./layouts/ProductComponent.vue";
import Reviews from "./layouts/ReviewsComponent.vue";
import Footer from "./layouts/FooterComponent.vue";

export default {
  name: "HomeComponent",
  components: {
    Banner,
    About,
    Featured,
    Count,
    Product,
    Reviews,
    Footer
  },
  props: {
    msg: String,
  },
};
</script>

<style scoped></style>
