<template>
  <section class="w-5/6 h-auto m-auto mb-12 grid gap-5 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
    <div
      v-for="product in products"
      :key="product.id"
      class="relative bg-gray-200 p-2 rounded shadow-md"
    >
      <p
        v-if="product.stock == 0"
        class="absolute right-2 top-2 w-16 h-16 rounded-full bg-cyan-600 text-white text-sm flex items-center justify-center"
      >
        Sin stock
      </p>

      <img
        class="h-52 m-auto rounded-full object-cover transition duration-300 transform hover:scale-110"
        alt="Imagen de producto"
        :src="require('@/assets/img/' + product.image)"
      />

      <p class="text-black text-xl text-center my-2">{{ product.name }}</p>
      <a
        class="cursor-pointer block w-3/6 m-auto text-cyan-400 text-center my-5 hover:text-cyan-800 hover:underline"
        >{{ product.category_name }}</a
      >
      <div class="w-full min-h-0 mb-5 flex items-center justify-around">
        <button
          @click="addToCart(product)"
          class="bg-cyan-500 hover:bg-cyan-400 text-sm lg:text-base rounded-sm duration-300 py-3 px-5"
        >
          Añadir <i class="fas fa-shopping-cart"></i>
        </button>
        <p class="text-cyan-600 text-center text-xl lg:text-2xl">{{ product.price }} $</p>
       <button
          @click="toggleDesired(product.id)"
          :class="[
            'border',
            'border-cyan-600',
            'py-2',
            'px-3',
            'hover:bg-cyan-400',
            'duration-300',
            { 'text-red-500': isDesired(product.id) },
          ]"
        >
          <i class="fas fa-heart"></i>
        </button>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      products: [],
      user_id: "",
      desiredProducts: [],
    };
  },
  mounted() {
     if (localStorage.getItem("userData")) {
      this.user_id = JSON.parse(localStorage.getItem("userData")).id;
    }
    this.analogicalProducts();
  },
  methods: {
    analogicalProducts() {
      axios
        .get("http://127.0.0.1:8000/api/luxury")
        .then((response) => {
          this.products = response.data.products;
          console.log(this.products);
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
    toggleDesired(product_id) {
      if (localStorage.getItem("userData")) {
        axios
          .post(
            `http://127.0.0.1:8000/api/toggle-desired/${this.user_id}/${product_id}`
          )
          .then((response) => {
            console.log(response);
            if (this.isDesired(product_id)) {
              this.desiredProducts = this.desiredProducts.filter(
                (id) => id !== product_id
              );
            } else {
              this.desiredProducts.push(product_id);
            }
          })
          .catch((error) => {
            console.error("Error:", error);
          });
      }else{
           this.$swal.fire({
            title: "Debe estar logueado para añadir a la lista de deseados",
            icon: "error",
            confirmButtonText: "OK",
          });
      }
    },
    isDesired(product_id) {
      return this.desiredProducts.includes(product_id);
    },
    addToCart(product) {
      if (localStorage.getItem("userData")) {
        if (product.stock != 0) {
          let cart = JSON.parse(localStorage.getItem("cart")) || [];

          if (!Array.isArray(cart)) {
            cart = [];
          }

          let found = cart.find((item) => item.id === product.id);

          if (found) {
            found.quantity += 1;
            found.subtotal = found.quantity * product.price;
            this.$swal.fire({
              title: "Producto agregado al carrito!!!",
              icon: "success",
            });
          } else {
            cart.push({
              id: product.id,
              name: product.name,
              price: product.price,
              quantity: 1,
              subtotal: product.price,
              image: product.image,
            });
            this.$swal.fire({
              title: "Producto agregado al carrito!!!",
              icon: "success",
            });
          }

          localStorage.setItem("cart", JSON.stringify(cart));
          console.log(JSON.parse(localStorage.getItem("cart")));
        } else {
          this.$swal.fire({
            title: "No hay stock para ese producto",
            icon: "error",
            confirmButtonText: "OK",
          });
        }
      }else{        
           this.$swal.fire({
            title: "Debe estar logueado para agregar productos al carrito",
            icon: "error",
            confirmButtonText: "OK",
          });
      }
    },
  
  },
};
</script>
