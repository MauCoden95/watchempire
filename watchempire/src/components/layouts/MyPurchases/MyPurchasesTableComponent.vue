<template>
  <div class="relative overflow-x-auto">
    <table
      class="w-5/6 m-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
    >
      <thead class="text-xs text-gray-700 uppercase bg-gray-300">
        <tr>
          <th scope="col" class="w-2/12 px-6 py-3 text-center">Total</th>
          <th scope="col" class="w-2/12 px-6 py-3 text-center">Fecha</th>
          <th scope="col" class="w-3/12 px-6 py-3 text-center">Hora</th>
          <th scope="col" class="w-3/12 px-6 py-3 text-center">
            Método de pago
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="sale in salesData" :key="sale.id" class="bg-white border-b">
          <td class="px-6 py-4 text-center text-gray-900">
            {{ sale.total }} $
          </td>
          <td class="px-6 py-4 text-center text-gray-900">
            {{ dateFormat(sale.date) }}
          </td>
          <td class="px-6 py-4 text-center text-gray-900">
            {{ hourFormat(sale.hour) }}
          </td>
          <td class="px-6 py-4 text-center text-gray-900">
            {{ sale.payment_method == "cash" ? "Efectivo" : " Tarjeta" }}
          </td>
          <td class="px-1 py-4 text-center text-gray-900">
            <router-link
              @click="saveUserAndSale(sale.user_id, sale.id)"
              to="/detalle-compra"
              class="text-xl rounded-lg duration-300 text-center"
            >
              <i
                class="fas fa-info-circle text-2xl hover:text-teal-600 duration-300"
              ></i
            ></router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: {
    sales: Array,
  },
  mounted() {
    this.getSalesByUserId();
    this.dateFormat("2024-09-01");
  },
  data() {
    return {
      userData: JSON.parse(localStorage.getItem("userData")),
      salesData: [],
    };
  },
  methods: {
    async getSalesByUserId() {
      const sales = await axios.get(
        `http://127.0.0.1:8000/api/get_sales_by_user_id/${this.userData.id}`
      );
      this.salesData = sales.data.sales;
      console.log(this.salesData);
    },
    dateFormat(date) {
      let dateSplit = date.split("-").reverse();
      let dateFormatted = dateSplit.join("-");
      return dateFormatted;
    },
    hourFormat(hour) {
      let hourFormatted = hour.substring(0, 5);
      return hourFormatted;
    },
    saveUserAndSale(userId, saleId) {
      localStorage.setItem("userId", userId);
      localStorage.setItem("saleId", saleId);
    },
  },
};
</script>
