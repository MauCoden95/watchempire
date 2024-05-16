<template>
  <div>
    <h2 class="text-4xl text-center my-16">Tienda</h2>
    <section
      class="w-4/6 min-h-0 lg:h-20 p-1.5 m-auto mb-12 rounded-xl lg:rounded-full bg-gray-400 flex flex-col lg:flex-row gap-2 items-center justify-between"
    >
      <button
        @click="changeCategory(1)"
        class="w-full lg:w-[20%] h-full py-3 rounded-md lg:rounded-l-full bg-gray-100 hover:bg-cyan-300 focus:bg-cyan-700 duration-300 text-xl"
      >
        Todos
      </button>
      <button
        @click="changeCategory(2)"
        class="w-full lg:w-[20%] h-full py-3 rounded-md lg:rounded-none bg-gray-100 hover:bg-cyan-300 focus:bg-cyan-700 duration-300 text-xl"
      >
        Analógico
      </button>
      <button
        @click="changeCategory(3)"
        class="w-full lg:w-[20%] h-full py-3 rounded-md lg:rounded-none bg-gray-100 hover:bg-cyan-300 focus:bg-cyan-700 duration-300 text-xl"
      >
        Pared
      </button>
      <button
        @click="changeCategory(4)"
        class="w-full lg:w-[20%] h-full py-3 rounded-md lg:rounded-none bg-gray-100 hover:bg-cyan-300 focus:bg-cyan-700 duration-300 text-xl"
      >
        Lujo
      </button>
      <button @click="changeCategory(5)"
        class="w-full lg:w-[20%] h-full py-3 rounded-md lg:rounded-r-full bg-gray-100 hover:bg-cyan-300 focus:bg-cyan-700 duration-300 text-xl"
      >
        Smartwatch
      </button>
    </section>

    <section class="w-full min-h-[1000px]">
      <div v-if="nro === 1">
        <AllProductsComponent />
      </div>

      <div v-else-if="nro === 2">
        <AnalogicalProductsComponent />
      </div>

      <div v-else-if="nro === 3">
        <WallProductsComponent />
      </div>

      <div v-else-if="nro === 4">
        <LuxuryProductsComponent />
      </div>

      <div v-else-if="nro === 5">
        <SmartWatchProductsComponent />
      </div>
    </section>

    <Featured />
  </div>
</template>

<script>
import Featured from "./layouts/FeaturedComponent.vue";
import AllProductsComponent from "./layouts/AllProductsComponent.vue";
import AnalogicalProductsComponent from "./layouts/AnalogicalProductsComponent.vue";
import WallProductsComponent from "./layouts/WallProductsComponent.vue";
import LuxuryProductsComponent from "./layouts/LuxuryProductsComponent.vue";
import SmartWatchProductsComponent from "./layouts/SmartwatchProductsComponent.vue";


export default {
  components: {
    Featured,
    AllProductsComponent,
    AnalogicalProductsComponent,
    WallProductsComponent,
    LuxuryProductsComponent,
    SmartWatchProductsComponent
  },
  data() {
    return {
      nro: 1,
    };
  },
  mounted() {},
  methods: {
    changeCategory(categoryNumber) {
      this.nro = categoryNumber;
      console.log(this.nro);
    },
  },
};
</script>
