<template>
  <section class="w-full min-h-[33rem] bg-gray-300 p-1 pb-20">
    <h2 class="text-center text-4xl my-10">Productos destacados</h2>
    <div class="w-5/6 min-h-0 m-auto grid grid-cols-3 grid-rows-2 gap-4">
      <div
        v-for="product in products"
        :key="product.id"
        class="relative bg-gray-200 p-2 rounded shadow"
      >
        <p
          v-if="product.stock <= 0"
          class="absolute right-2 top-2 w-16 h-16 rounded-full bg-cyan-600 text-white text-sm flex items-center justify-center"
        >
          Sin stock
        </p>
        <img
          class="h-52 m-auto rounded-full"
          alt="Imagen de producto"
          :src="require('@/assets/img/' + product.image)"
        />

        <p class="text-black text-xl text-center my-2">{{ product.name }}</p>
        <a
          class="cursor-pointer block text-cyan-400 text-center my-3 hover:text-cyan-800 hover:underline"
          >{{ product.category_name }}</a
        >
        <div class="w-full min-h-0 mb-5 flex items-center justify-around">
          <button class="bg-cyan-500 hover:bg-cyan-400 duration-300 py-3 px-5">Añadir <i class="fas fa-shopping-cart"></i></button>
          <p class="text-cyan-600 text-center text-2xl">
            {{ product.price }} $
          </p>
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
    };
  },
  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/random-products")
      .then((response) => {
        this.products = response.data;
        console.log("Response data:", this.products);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  },
};
</script>
