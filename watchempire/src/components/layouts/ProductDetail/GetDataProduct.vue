<template>
  <section class="h-full min-h-[30rem] bg-gray-100">
    <div
      class="relative w-5/6 h-full m-auto py-12 flex items-center justify-around"
    >
      <p
        v-if="dataProduct.stock == 0"
        class="absolute left-3 top-12 w-24 h-24 rounded-full bg-cyan-600 text-white text-xl flex items-center justify-center"
      >
        Sin stock
      </p>
      <img class="w-3/6 h-full" :src="image" />
      <div class="product_info w-3/6 px-10 bg-gray-300 py-14 rounded-xl">
        {{ dataProduct.id }}
        <h2 class="text-3xl font-bold">{{ dataProduct.name }}</h2>
        <p class="text-xl my-5 text-justify">
          {{ dataProduct.description }}
        </p>
        <div class="w-auto h-auto mt-8 flex items-center justify-between">
          <select class="w-2/5 p-3" name="color" id="color">
            <option value="">-- Color --</option>
            <option value="Celeste">Celeste</option>
            <option value="Rojo">Rojo</option>
            <option value="Verde">Verde</option>
          </select>
          <div
            class="w-2/5 bg-gray-100 flex items-center justify-between rounded-md overflow-hidden"
          >
            <button
              @click="decreaseQuantity"
              class="w-1/3 h-12 hover:bg-slate-400 duration-300 border-r border-gray-500 text-2xl"
            >
              -
            </button>
            <span class="text-2xl">{{ quantity }}</span>
            <button
              @click="increaseQuantity"
              class="w-1/3 h-12 hover:bg-slate-400 duration-300 border-l border-gray-500 text-2xl"
            >
              +
            </button>
          </div>
        </div>
        <h3 class="text-3xl my-6">
          {{ dataProduct.price }} <span class="text-cyan-400">$</span>
        </h3>
        <button
          @click="addToCart"
          class="bg-cyan-600 hover:bg-cyan-400 duration-300 rounded-md py-3 px-7"
        >
          Añadir al carrito <i class="fas fa-shopping-cart"></i>
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
      dataProduct: {},
      image: "",
      cart: [],
      quantity: 1, 
    };
  },
  methods: {
    getProduct() {
      const url = window.location.href;
      const urlArray = url.split("/");

      axios
        .get(`http://127.0.0.1:8000/api/data-product/${urlArray[4]}`)
        .then((response) => {
          this.dataProduct = response.data;
          this.image = this.dataProduct.image;
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
    addToCart() {
      if (!localStorage.getItem("token")) {
        this.$swal.fire({
          title: "Error",
          text: "Debe estar logueado para agregrar productos al carrito",
          icon: "error",
          confirmButtonText: "Aceptar",
        });
      } else {    
        let cartFind = this.cart.find(
          (item) => item.id == this.dataProduct.id
        );

        if (cartFind) {
          cartFind.quantity += this.quantity;
           this.$swal.fire({
              title: "Producto agregado al carrito!!!",
              icon: "success",
            });
        } else {
          this.cart.push({
            id: this.dataProduct.id,
            name: this.dataProduct.name,
            price: this.dataProduct.price,
            quantity: this.quantity,
            image: this.image,
          });
           this.$swal.fire({
              title: "Producto agregado al carrito!!!",
              icon: "success",
            });
        }

        localStorage.setItem("cart", JSON.stringify(this.cart));
        this.quantity = 1; 
      }
    },
    increaseQuantity() {
      this.quantity++;
    },
    decreaseQuantity() {
      if (this.quantity > 1) {
        this.quantity--;
      }
    },
  },
  mounted() {
    this.cart = JSON.parse(localStorage.getItem("cart")) || [];
    this.getProduct();
  },
};
</script>
