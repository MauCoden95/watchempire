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
          class="bg-cyan-500 hover:bg-cyan-400 text-sm lg:text-base rounded-sm duration-300 py-3 px-5"
        >
          Añadir <i class="fas fa-shopping-cart"></i>
        </button>
        <p class="text-cyan-600 text-center text-xl lg:text-2xl">{{ product.price }} $</p>
        <button
          class="border border-cyan-600 py-2 px-3 hover:bg-cyan-400 duration-300"
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
    };
  },
  mounted() {
    this.allProducts();
  },
  methods: {
    allProducts() {
      axios
        .get("http://127.0.0.1:8000/api/all-products")
        .then((response) => {
          this.products = response.data;
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
  },
};
</script>
