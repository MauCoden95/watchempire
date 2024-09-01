<template>
  <div class="relative overflow-x-auto">
    <h1 class="my-12 text-2xl text-center">Detalles de compra</h1>
    <router-link to="/mis-compras" class="absolute top-5 right-24 text-2xl rounded-lg duration-300 text-center">
      <i class="fas fa-arrow-left text-2xl"></i> Volver</router-link>
    <table class="w-5/6 m-auto my-12 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-300">
        <tr>
          <th scope="col" class="w-4/12 px-6 py-3 text-center">Product</th>
          <th scope="col" class="w-2/12 px-6 py-3 text-center">Imagen</th>
          <th scope="col" class="w-2/12 px-6 py-3 text-center">Precio</th>
          <th scope="col" class="w-3/12 px-6 py-3 text-center">Cantidad</th>
          <th scope="col" class="w-4/12 px-6 py-3 text-center">Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in productsBySale" :key="product.id" class="bg-white border-b">
          <td class="px-6 py-4 text-sm text-center text-gray-900">
            {{ product.product_name }}
          </td>
          <td class="px-6 py-4 text-sm text-center text-gray-900">
            <img class="h-24 m-auto rounded-full object-cover transition"
              alt="Imagen de producto" :src="require('@/assets/img/' + product.image)" />
          </td>
          <td class="px-6 py-4 text-sm text-center text-gray-900">
            {{ product.product_price }} $
          </td>
          <td class="px-6 py-4 text-sm text-center text-gray-900">
            {{ product.quantity }}
          </td>
          <td class="px-6 py-4 text-sm text-center text-gray-900">
            {{ product.subtotal }} $
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
import axios from "axios";


export default {
  data() {
    return {
      user_id: 0,
      sale_id: 0,
      productsBySale: []
    }
  },
  methods: {
    async getProductsBySaleByUser() {
      const products = await axios.get(
        `http://127.0.0.1:8000/api/user/${this.user_id}/sale/${this.sale_id}/products`
      );
      this.productsBySale = products.data.products;
    }
  },
  mounted() {
    this.user_id = localStorage.getItem('userId');
    this.sale_id = localStorage.getItem('saleId');
    this.getProductsBySaleByUser();
  }
}
</script>