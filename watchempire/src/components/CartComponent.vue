<template>
  <section class="w-full min-h-[33rem] p-1 pb-20">
    <div class="w-5/6 h-20 m-auto mt-12 flex items-center justify-between">
      <h2 class="text-4xl">Mi carrito</h2>
      <router-link to="/tienda" class="text-xl">
        <i class="fas fa-arrow-left"></i> Seguir comprando
      </router-link>
    </div>

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
                class="w-full text-2xl px-6 py-4 text-center text-gray-900 font-medium whitespace-nowrap flex items-center justify-center"
              >
                <img
                  class="h-36 m-auto rounded-full object-cover transition duration-300 transform hover:scale-110"
                  alt="Imagen de producto"
                  :src="require('@/assets/img/' + item.image)"
                />
                {{ item.name }}
              </th>
              <td class="w-1/6 text-2xl px-6 py-4 text-center text-gray-900">
                {{ item.price }} $
              </td>
              <td class="text-2xl px-6 py-4 text-center text-gray-900">
                <button
                  @click="addQuantity(item.id)"
                  class="w-8 h-8 rounded-md bg-gray-500 hover:bg-slate-700 mr-2 duration-300"
                >
                  +
                </button>
                {{ item.quantity }}
                <button
                  @click="removeQuantity(item.id)"
                  class="w-8 h-8 rounded-md bg-gray-500 hover:bg-slate-700 ml-2 duration-300"
                >
                  -
                </button>
              </td>
              <td class="text-2xl px-6 py-4 text-center text-gray-900">
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

      <div
        class="w-5/6 h-auto m-auto bg-gray-300 mt-12 p-8 rounded-xl flex justify-between"
      >
        <div class="w-2/5 h-full px-5">
          <h2 class="text-center text-2xl py-3">Elija modo de envío</h2>

          <div class="flex items-center my-4">
            <input
              id="default-checkbox"
              type="radio"
              value="free"
              name="shipping"
              v-model="check"
              checked
              class="w-4 h-4 text-black bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            />
            <label
              for="default-checkbox"
              class="ms-2 text-base font-medium text-gray-900"
            >
              En el local = Gratis
            </label>
          </div>
          <div class="flex items-center">
            <input
              id="checked-checkbox"
              type="radio"
              value="shopping"
              name="shipping"
              v-model="check"
              class="w-4 h-4 text-black bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            />
            <label
              for="checked-checkbox"
              class="ms-2 text-base font-medium text-gray-900"
            >
              Envío a domicilio = 20% de recargo
            </label>
          </div>
        </div>

        <div class="w-2/5 h-full">
          <h3 class="w-5/6 p-3 mt-5">
            Subtotal:
            <span class="float-right font-bold">{{ totalSubtotal }} $</span>
          </h3>
          <h3 class="w-5/6 p-3 mt-2 mb-7">
            Envío: <span class="float-right font-bold">{{ totalMessage }}</span>
          </h3>
          <h3 class="text-xl font-bold">Métodos de pago</h3>
          <div class="flex items-center my-4">
            <input
              id="cash-checkbox"
              type="radio"
              value="cash"
              name="payment"
              v-model="pay"
              class="w-4 h-4 text-black bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            />
            <label
              for="cash-checkbox"
              class="w-[75%] ms-2 text-base font-medium text-gray-900"
            >
              Efectivo:
              <span class="float-right font-bold"
                ><i class="fas fa-money-bill-wave-alt text-2xl"></i
              ></span>
            </label>
          </div>
          <div class="flex items-center my-4">
            <input
              id="card-checkbox"
              type="radio"
              value="card"
              name="payment"
              v-model="pay"
              class="w-4 h-4 text-black bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            />
            <label
              for="card-checkbox"
              class="w-[75%] ms-2 text-base font-medium text-gray-900"
            >
              Tarjeta:
              <span class="float-right font-bold"
                ><i class="fab fa-cc-mastercard text-2xl mr-2"></i
                ><i class="fab fa-cc-visa text-2xl mr-2"></i>
                <i class="fab fa-cc-amex text-2xl"></i>
              </span>
            </label>
          </div>
          <h2 class="w-5/6 p-3 mb-5 bg-cyan-400 rounded-lg">
            TOTAL: <span class="float-right font-bold">{{ total }} $</span>
          </h2>
          <button
            class="w-5/6 text-xl hover:before:bg-redborder-red-500 relative h-[50px] overflow-hidden border border-blue-800 bg-blue-300 px-3 text-blue-800 shadow-2xl transition-all before:absolute before:bottom-0 before:left-0 before:top-0 before:z-0 before:h-full before:w-0 before:bg-blue-600 before:transition-all before:duration-500 hover:text-white hover:before:left-0 hover:before:w-full"
          >
            <span class="relative z-10">Confirmar compra <i class="fas fa-shopping-bag"></i></span>
          </button>
        </div>
      </div>
    </div>
    <div v-else>
      <h2 class="text-2xl text-center my-7">No hay productos en el carrito</h2>
    </div>
  </section>
</template>

<script>
export default {
  name: "CartComponent",
  data() {
    return {
      token: localStorage.getItem("token"),
      cart: [],
      check: "free",
      pay: "cash",
    };
  },
  mounted() {
    this.cart = JSON.parse(localStorage.getItem("cart"));

    if (this.token == null) {
      this.$router.push({ path: "/" });
    }
  },
  methods: {
    deleteItem(productId) {
      const findIndex = this.cart.findIndex((item) => item.id === productId);
      if (findIndex !== -1) {
        this.cart.splice(findIndex, 1);
        localStorage.setItem("cart", JSON.stringify(this.cart));
      }
    },
    addQuantity(productId) {
      let find = this.cart.find((item) => item.id == productId);
      find.quantity++;
      find.subtotal = find.quantity * find.price;
    },
    removeQuantity(productId) {
      let find = this.cart.find((item) => item.id == productId);
      find.quantity == 1 ? find.quantity == 1 : find.quantity--;
      find.subtotal = find.quantity * find.price;
    },
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
