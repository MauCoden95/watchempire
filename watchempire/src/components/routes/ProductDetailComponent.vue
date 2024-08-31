<template>
  <GetDataProduct />
</template>

<script>
import GetDataProduct from "../layouts/ProductDetail/GetDataProduct.vue";

export default {
  components: { GetDataProduct },
  name: "ProductDetailComponent",
  mounted() {
    window.scrollTo(0, 0);
  },
};
</script>
