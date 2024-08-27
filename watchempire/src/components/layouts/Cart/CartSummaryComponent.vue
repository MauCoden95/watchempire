<template>
  <div>
    <div
      class="w-5/6 h-auto m-auto bg-gray-300 mt-12 py-8 px-3 rounded-xl flex justify-between"
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
          <span class="float-right font-bold">{{ subtotal_price }} $</span>
        </h3>
        <h3 class="w-5/6 p-3 mt-2 mb-7">
          Envío: <span class="float-right font-bold">{{ message }}</span>
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
        <div v-if="dataCard === 'Card'" class="mt-5 my-7">
          <input class="w-5/6 p-1.5 mt-3 bg-gray-200 focus:outline-none border-b-4 border-cyan-700" type="number" placeholder="Número tarjeta"/>
        </div>
        <div v-if="dataCard === 'Card'" class="w-5/6 flex gap-4 justify-between mt-5 my-7">
          <input class="w-3/6 p-1.5 mt-3 bg-gray-200 focus:outline-none border-b-4 border-cyan-700" type="number" placeholder="Código"/>
          <input class="w-3/6 p-1.5 mt-3 bg-gray-200 focus:outline-none border-b-4 border-cyan-700" type="number" placeholder="MM/AA"/>
        </div>
        <h2 class="w-5/6 p-3 mb-5 bg-cyan-400 rounded-lg">
          TOTAL: <span class="float-right font-bold">{{ totalPrice }} $</span>
        </h2>
        <button
          class="w-5/6 text-xl rounded-md hover:before:bg-redborder-red-500 relative h-[50px] overflow-hidden border border-blue-800 bg-blue-300 px-3 text-blue-800 shadow-2xl transition-all before:absolute before:bottom-0 before:left-0 before:top-0 before:z-0 before:h-full before:w-0 before:bg-blue-600 before:transition-all before:duration-500 hover:text-white hover:before:left-0 hover:before:w-full"
        >
          <span class="relative z-10 text-base"
            >Confirmar compra <i class="fas fa-shopping-bag text-base"></i
          ></span>
        </button>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  props: {
    totalSubtotal: [Number],
    totalMessage: [String],
    total: [String],
  },
  data() {
    return {
      check: 'free',
      pay: 'cash'
    };
  },
  computed: {
    subtotal_price(){
        if (this.check === "free") {
        return this.totalSubtotal;
      } else if (this.check === "shopping") {
        return this.totalSubtotal * 1.2;
      } else {
        return this.totalSubtotal;
      }
    },
    message(){
        if (this.check === "free") {
        return "Gratis";
      } else if (this.check === "shopping") {
        return "20% de recargo";
      } else {
        return "Gratis";
      }
    },
    totalPrice(){
      return this.subtotal_price;
    },
    dataCard(){
        if(this.pay === "card"){
          return "Card"
        } else {
          return "Cash"
        }
    }
  }
};
</script>
