<template>
  <section class="w-full min-h-[33rem] p-1 pb-20">
    <div class="w-5/6 h-20 m-auto mt-12 flex items-center justify-between">
      <h2 class="text-4xl">Mi carrito</h2>
      <router-link to="/tienda" class="text-xl">
        <i class="fas fa-arrow-left"></i> Seguir comprando
      </router-link>
    </div>

    <div class="w-5/6 m-auto mt-8">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase">
          <tr>
            <th scope="col" class="w-2/5 text-xl px-6 py-6 text-center">Producto</th>
            <th scope="col" class="w-1/6 text-xl px-6 py-6 text-center">Precio</th>
            <th scope="col" class="text-xl px-6 py-6 text-center">Cantidad</th>
            <th scope="col" class="text-xl px-6 py-6 text-center">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b">
            <th
              scope="row"
              class="w-full text-2xl px-6 py-4 text-center text-gray-900 font-medium whitespace-nowrap flex items-center justify-center"
            >
              <img class="w-1/5" src="../assets/img/lujo2.png" />
              Reloj de Lujo 1
            </th>
            <td class="w-1/6 text-2xl px-6 py-4 text-center text-gray-900">65000 $</td>
            <td class="text-2xl px-6 py-4 text-center text-gray-900">
              <button class="w-8 h-8 rounded-md bg-gray-500 hover:bg-slate-700 mr-2 duration-300">
                +
              </button>
              1
              <button class="w-8 h-8 rounded-md bg-gray-500 hover:bg-slate-700 ml-2 duration-300">
                -
              </button>
            </td>
            <td class="text-2xl px-6 py-4 text-center text-gray-900">$2999</td>
            <td class="">
              <button class="fas fa-trash text-3xl px-8 text-red-500 hover:text-red-700"></button>
            </td>
          </tr>
          <tr class="bg-white border-b">
            <th
              scope="row"
              class="w-full text-2xl px-6 py-4 text-center text-gray-900 font-medium whitespace-nowrap flex items-center justify-center"
            >
              <img class="w-1/5" src="../assets/img/analogico7.png" />
              Reloj Analogico 7
            </th>
            <td class="w-1/6 text-2xl px-6 py-4 text-center text-gray-900">45000 $</td>
            <td class="text-2xl px-6 py-4 text-center text-gray-900">
              <button class="w-8 h-8 rounded-md bg-gray-500 hover:bg-slate-700 mr-2 duration-300">
                +
              </button>
              1
              <button class="w-8 h-8 rounded-md bg-gray-500 hover:bg-slate-700 ml-2 duration-300">
                -
              </button>
            </td>
            <td class="text-2xl px-6 py-4 text-center text-gray-900">$2999</td>
            <td class="">
              <button class="fas fa-trash text-3xl px-8 text-red-500 hover:text-red-700"></button>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="w-full h-56 bg-gray-300 mt-12 rounded-xl flex items-center justify-between">
        <div class="w-2/5 h-full px-5">
          <h2 class="text-center text-2xl py-3">Elija modo de envío</h2>

          <div class="flex items-center my-4">
            <input
              id="default-checkbox"
              type="radio"
              value=""
              name="shopping"
              checked
              class="w-4 h-4 text-black bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            />
            <label for="default-checkbox" class="ms-2 text-base font-medium text-gray-900">
              En el local = Gratis
            </label>
          </div>
          <div class="flex items-center">
            <input
              id="checked-checkbox"
              type="radio"
              value=""
              name="shopping"
              class="w-4 h-4 text-black bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            />
            <label for="checked-checkbox" class="ms-2 text-base font-medium text-gray-900">
              Envío a domicilio = 20% de recargo
            </label>
          </div>
        </div>

        <div class="w-2/5 h-full px-5 flex flex-col items-start justify-center">
          <h3 class="w-5/6 p-3">
            Subtotal: <span class="float-right font-bold">240000 $</span>
          </h3>
          <h3 class="w-5/6 p-3 my-5">
            Envío: <span class="float-right font-bold">Gratis</span>
          </h3>
          <h2 class="w-5/6 p-3 bg-cyan-400 rounded-lg">
            TOTAL: <span class="float-right font-bold">240000 $</span>
          </h2>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "CartComponent",
  data() {
    return {
      token: localStorage.getItem('token')
    }
  },
  mounted() {
    if (this.token == null) {
      this.$router.push({ path: '/' });
    }
  }
};
</script>
