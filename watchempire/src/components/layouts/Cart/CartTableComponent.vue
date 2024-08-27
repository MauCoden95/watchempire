<template>
  <div>
    <div v-if="cart && cart.length >= 1">
      <div class="w-5/6 m-auto mt-8">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
          <thead class="text-xs text-gray-700 uppercase">
            <tr>
              <th scope="col" class="w-2/5 text-xl px-6 py-6 text-center">
                Producto
              </th>
              <th scope="col" class="w-1/6 text-xl px-6 py-6 text-center">
                Precio
              </th>
              <th scope="col" class="text-xl px-6 py-6 text-center">
                Cantidad
              </th>
              <th scope="col" class="text-xl px-6 py-6 text-center">
                Subtotal
              </th>
            </tr>
          </thead>
          <tbody v-for="item in cart" :key="item.id">
            <tr class="bg-white border-b">
              <th
                scope="row"
                class="w-full text-xl px-6 py-4 text-center text-gray-900 font-medium whitespace-nowrap flex items-center justify-center"
              >
                <img
                  class="h-36 m-auto rounded-full object-cover transition duration-300 transform hover:scale-110"
                  alt="Imagen de producto"
                  :src="require('@/assets/img/' + item.image)"
                />
                {{ item.name }}
              </th>
              <td class="w-1/6 text-xl px-6 py-4 text-center text-gray-900">
                {{ item.price }} $
              </td>
              <td class="text-2xl px-6 py-4 text-center text-gray-900">
                <button
                  @click="addQuantity(item.id)"
                  class="w-6 h-auto px-1 rounded-md bg-gray-500 hover:bg-slate-700 mr-2 duration-300"
                >
                  +
                </button>
                {{ item.quantity }}
                <button
                  @click="removeQuantity(item.id)"
                  class="w-6 h-auto px-1 rounded-md bg-gray-500 hover:bg-slate-700 ml-2 duration-300"
                >
                  -
                </button>
              </td>
              <td class="text-xl px-6 py-4 text-center text-gray-900">
                ${{ item.subtotal }}
              </td>
              <td class="">
                <button
                  @click="deleteItem(item.id)"
                  class="fas fa-trash text-3xl px-8 text-red-500 hover:text-red-700"
                ></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div v-else>
      <h2 class="text-2xl text-center my-7">No hay productos en el carrito</h2>
    </div>

    <CartSummaryComponent  :total=total :totalMessage=totalMessage :totalSubtotal=totalSubtotal />
  </div>
</template>


<script>
import CartSummaryComponent from './CartSummaryComponent.vue';
export default {
  components: { CartSummaryComponent },
  props: {
    cart: Array,
    deleteItem: Function,
    addQuantity: Function,
    removeQuantity: Function,
  },
  computed: {
    totalSubtotal() {
      return this.cart.reduce((accumulator, currentItem) => {
        return accumulator + currentItem.subtotal;
      }, 0);
    },
    total() {
      if (this.check === "free") {
        return this.totalSubtotal;
      } else if (this.check === "shopping") {
        return this.totalSubtotal * 1.2;
      } else {
        return this.totalSubtotal;
      }
    },
    totalMessage() {
      if (this.check === "free") {
        return "Gratis";
      } else if (this.check === "shopping") {
        return "20% de recargo";
      } else {
        return "Gratis";
      }
    },
  },
};
</script>