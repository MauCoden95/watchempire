<template>
  <section class="w-full min-h-[33rem] p-1 pb-20">
   <HeaderCartComponent />

   <CartTableComponent :cart=cart :addQuantity=addQuantity :deleteItem=deleteItem :removeQuantity=removeQuantity />
  </section>
</template>

<script>
import CartTableComponent from '../layouts/Cart/CartTableComponent.vue';
import HeaderCartComponent from '../layouts/Cart/HeaderCartComponent.vue';
export default {
  components: { CartTableComponent, HeaderCartComponent },
  name: "CartComponent",
  data() {
    return {
      token: localStorage.getItem("token"),
      cart: [],
      check: "free",
      pay: "cash"
    };
  },
  mounted() {
    this.cart = JSON.parse(localStorage.getItem("cart"));

    if (this.token == null) {
      this.$router.push({ path: "/" });
    }
  },
  methods: {
    deleteItem(productId) {
      const findIndex = this.cart.findIndex((item) => item.id === productId);
      if (findIndex !== -1) {
        this.cart.splice(findIndex, 1);
        localStorage.setItem("cart", JSON.stringify(this.cart));
      }
    },
    addQuantity(productId) {
      let find = this.cart.find((item) => item.id == productId);
      find.quantity++;
      find.subtotal = find.quantity * find.price;
    },
    removeQuantity(productId) {
      let find = this.cart.find((item) => item.id == productId);
      find.quantity == 1 ? find.quantity == 1 : find.quantity--;
      find.subtotal = find.quantity * find.price;
    },
  },
  
};
</script>
