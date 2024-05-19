<template>
  <section class="h-full min-h-[30rem] bg-gray-100">
    <div class="w-5/6 h-full m-auto flex items-center justify-around">
      <img class="w-3/6" src="../assets/img/smartwatch6.png" />
      <div class="w-5/6 px-10">
        <h2 class="text-5xl">{{ dataProduct.name }}</h2>
        <p class="text-xl my-5 text-justify">
          {{ dataProduct.description }}
        </p>
        <div class="w-auto h-auto mt-8">
          <i class="fas fa-circle text-2xl mr-2 text-cyan-600"></i
          ><i class="fas fa-circle text-2xl mr-2 text-orange-600"></i
          ><i class="fas fa-circle text-2xl text-yellow-500"></i>
        </div>
        <h3 class="text-3xl my-3">
          {{ dataProduct.price }} <span class="text-cyan-400">$</span>
        </h3>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";

export default {
  name: "ProductDetailComponent",
  data() {
    return {
      dataProduct: [],
      image: "",
    };
  },
  mounted() {
    const url = window.location.href;
    const urlArray = url.split("/");

    console.log(urlArray);

    axios
      .get(`http://127.0.0.1:8000/api/data-product/${urlArray[4]}`)
      .then((response) => {
        this.dataProduct = response.data;
        this.image = this.dataProduct.image;
        console.log(this.dataProduct);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
};
</script>
