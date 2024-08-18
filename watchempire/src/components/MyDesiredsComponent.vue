<template>
  <section class="h-full min-h-[30rem] bg-gray-100">
    <div class="relative w-5/6 h-full m-auto py-12">
      <h2 class="text-center my-5 text-3xl">Lista de deseados</h2>
      <div v-if="products.length >= 1">
        <div class="relative overflow-x-auto mt-12">
          <div class="overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
              <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                <tr>
                  <th scope="col" class="px-6 py-3 border text-center text-sm md:text-base">
                    Producto
                  </th>
                  <th scope="col" class="px-6 py-3 border text-center text-sm md:text-base">
                    Imagen
                  </th>
                  <th scope="col" class="px-6 py-3 border text-center text-sm md:text-base">
                    Precio
                  </th>
                  <th scope="col" class="px-6 py-3 border text-center text-sm md:text-base">
                    Acciones
                  </th>
                </tr>
              </thead>
              <tbody v-for="product in products" :key="product.id">
                <tr class="bg-white border-b">
                  <td
                    scope="row"
                    class="px-0 md:px-6 py-4 font-medium text-base md:text-xl text-gray-900 whitespace-nowrap border text-center"
                  >
                    {{ product.name }}
                  </td>
                  <td class="px-0 md:px-6 py-4 border text-center">
                    <img
                      class="h-20 md:h-32 m-auto rounded-full object-cover transition duration-300 transform hover:scale-110"
                      alt="Imagen de producto"
                      :src="require('@/assets/img/' + product.image)"
                    />
                  </td>
                  <td class="px-0 md:px-6 py-4 border text-center text-base md:text-xl">
                    {{ product.price }} $
                  </td>
                  <td class="px-6 py-4 border text-center text-base md:text-xl">
                    <button
                      @click="deleteDesired(product.id)"
                      class="text-red-500 hover:text-red-800 duration-300 text-3xl"
                    >
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div v-else>
            <h2 class="text-2xl text-center my-7">No hay productos en la lista de deseados</h2>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";

export default {
  name: "MyDesiredsComponent",
  data() {
    return {
      products: [],
      user: "",
    };
  },
  mounted() {
    this.user = JSON.parse(localStorage.getItem("userData"));
    console.log(this.user.id);

    axios
      .get(
        `http://127.0.0.1:8000/api/get-desired-products-by-userid/${this.user.id}`
      )
      .then((response) => {
        this.products = response.data;
        console.log(this.products);
      });
  },
  methods: {
    deleteDesired(product_id) {
      axios
        .post(
          `http://127.0.0.1:8000/api/toggle-desired/${this.user.id}/${product_id}`
        )
        .then((response) => {
          console.log(response);
          this.products = this.products.filter(
            (product) => product.id !== product_id
          );
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
  },
};
</script>
