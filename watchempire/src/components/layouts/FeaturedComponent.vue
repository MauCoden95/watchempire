<template>
  <section class="w-full min-h-[33rem] bg-gray-300 p-1 pb-20">
    <h2 class="text-center text-4xl my-10">Productos destacados</h2>
    <div
      class="w-5/6 min-h-0 m-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-rows-2 gap-11"
    >
      <div
        v-for="product in products"
        :key="product.id"
        class="relative bg-gray-200 p-2 rounded shadow-md"
      >
        <router-link :to="`/producto/${product.id}`">
          <i
            class="cursor-pointer duration-300 absolute top-2 left-3 fas fa-info-circle text-3xl text-cyan-600 hover:text-cyan-800"
          ></i>
        </router-link>
        <p
          v-if="product.stock == 0"
          class="absolute right-3 top-2 w-16 h-16 rounded-full bg-cyan-600 text-white text-sm flex items-center justify-center"
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
            class="bg-cyan-500 hover:bg-cyan-400 rounded-sm duration-300 py-3 px-5"
          >
            Añadir <i class="fas fa-shopping-cart"></i>
          </button>
          <p class="text-cyan-600 text-center text-2xl">
            {{ product.price }} $
          </p>
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
    </div>
  </section>
</template>

<script>
import axios from "axios";

export default {
  name: "CountComponent",
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

    axios
      .get("http://127.0.0.1:8000/api/random-products")
      .then((response) => {
        this.products = response.data;
      })
      .catch((error) => {
        console.error("Error:", error);
      });

    axios
      .get(`http://127.0.0.1:8000/api/desired-products/${this.user_id}`)
      .then((response) => {
        this.desiredProducts = response.data;
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  },
  methods: {
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
