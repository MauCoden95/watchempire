<template>
  <section class="w-full min-h-[33rem] bg-gray-300 p-1 pb-20">
    <div class="w-5/6 h-full m-auto mt-12 flex items-center justify-evenly">
      <img class="w-2/5" :src="'@/assets/img/' + product.image" />
      <div class="w-2/5 h-auto flex flex-col items-start">
        <h2 class="text-4xl font-bold">{{ product.name }}</h2> 
        <h3 class="text-3xl text-cyan-600 my-3">${{ product.price }}</h3>
        <p class="text-base text-justify my-3">
          {{ product.description }}
        </p>
        <h3 class="text-xl font-bold">Color</h3>
         <div class="w-auto h-auto">
          <i class="fas fa-circle text-2xl mr-2 text-cyan-600"></i
          ><i class="fas fa-circle text-2xl mr-2 text-orange-600"></i
          ><i class="fas fa-circle text-2xl text-yellow-500"></i>
        </div>
        <a
          class="bg-cyan-600 hover:bg-cyan-300 duration-300 py-2 px-5 text-xl mt-4 rounded"
          href=""
          >Comprar ahora</a
        >
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";

export default {
  name: "ProductComponent",
  data() {
    return {
      product: {} 
    }
  },
  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/one-product")
      .then((response) => {
        this.product = response.data[0]; 
        console.log("Response data:", this.product.image);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  },
};
</script>
