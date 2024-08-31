<template>
  <button
    type="button"
    @click="sendBuy($event, cardNumber)"
    class="w-5/6 text-xl rounded-md hover:before:bg-redborder-red-500 relative h-[50px] overflow-hidden border border-blue-800 bg-blue-300 px-3 text-blue-800 shadow-2xl transition-all before:absolute before:bottom-0 before:left-0 before:top-0 before:z-0 before:h-full before:w-0 before:bg-blue-600 before:transition-all before:duration-500 hover:text-white hover:before:left-0 hover:before:w-full"
  >
    <span class="relative z-10 text-base"
      >Confirmar compra <i class="fas fa-shopping-bag text-base"></i
    ></span>
  </button>
</template>


<script>
export default {
    props:{
        sendBuy: Function
    }
};
</script>