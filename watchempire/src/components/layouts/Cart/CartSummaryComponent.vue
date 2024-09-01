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

        <form>
          <div v-if="dataCard === 'Card'" class="mt-5 mb-3">
            <input
              v-model="cardNumber"
              class="w-5/6 p-1.5 mt-3 bg-gray-200 focus:outline-none border-b-4 border-cyan-700"
              type="number"
              placeholder="Número tarjeta"
            />
          </div>
          <div v-if="dataCard === 'Card'" class="mt-5 mb-3">
            <input
              v-model="cardName"
              class="w-5/6 p-1.5 mt-3 bg-gray-200 focus:outline-none border-b-4 border-cyan-700"
              type="text"
              placeholder="Titular tarjeta"
            />
          </div>
          <div
            v-if="dataCard === 'Card'"
            class="w-5/6 flex gap-4 justify-between mt-2 mb-7"
          >
            <input
              class="w-3/6 p-1.5 mt-3 bg-gray-200 focus:outline-none border-b-4 border-cyan-700"
              type="number"
              placeholder="Código"
              v-model="code"
              min="000"
              max="999"
            />
            <input
              class="w-3/6 p-1.5 mt-3 bg-gray-200 focus:outline-none border-b-4 border-cyan-700"
              type="text"
              v-model="cardValid"
              placeholder="MM/AA"
            />
          </div>
          <h2 class="w-5/6 p-3 mb-5 bg-cyan-400 rounded-lg">
            TOTAL: <span class="float-right font-bold">{{ totalPrice }} $</span>
          </h2>

          <ConfirmBuyComponent :sendBuy="sendBuy" />
        </form>

        <div class="mt-6" v-if="generateInvoice == true">
          <GenerateInvoicesComponent />
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";
import ConfirmBuyComponent from "./ConfirmBuyComponent.vue";
import GenerateInvoicesComponent from "./GenerateInvoicesComponent.vue";

export default {
  components: {
    ConfirmBuyComponent,
    GenerateInvoicesComponent,
  },
  props: {
    totalSubtotal: [Number],
    totalMessage: [String],
    total: [String],
    cart: Array,
  },
  data() {
    return {
      check: "free",
      pay: "cash",
      cardNumber: 0,
      cardName: "",
      cardValid: "",
      code: 0,
      generateInvoice: false,
    };
  },
  methods: {
    validateCreditCard(num) {
      let numStr = num.toString();
      let cardName = this.cardName;
      let code = this.code;
      let [cardMonth, cardYear] = this.cardValid.split("/").map(Number);
      cardYear += 2000;

      let errors = [];

      const today = new Date();
      const currentMonth = today.getMonth() + 1;
      const currentYear = today.getFullYear();

      if (numStr.length < 16) {
        errors.push("Número de tarjeta inválido");
      }

      if (cardName == "") {
        errors.push("Ingrese un nombre válido");
      }

      if (code == "") {
        errors.push("Código inválido");
      }

      if (isNaN(cardMonth) || isNaN(cardYear)) {
        errors.push("Fecha de vencimiento inválida");
      } else if (
        cardYear < currentYear ||
        (cardYear === currentYear && cardMonth < currentMonth)
      ) {
        errors.push("La tarjeta está vencida");
      }

      if (errors.length > 0) {
        return errors;
      } else {
        return true;
      }
    },

    messageResponse(status, ...empty) {
      if (status == "success") {
        this.$swal.fire({
          text: "Compra realizada",
          title: "Felicidades!!!",
          icon: "success",
        });
        this.generateInvoice = true;
      } else {
        this.$swal.fire({
          title: "Error",
          text: "No se pudo procesar la compra o campos vacíos",
          icon: "error",
          confirmButtonText: "Aceptar",
        });
      }

      if (empty != "") {
        this.$swal.fire({
          title: "Error",
          text: "Carrito vacío",
          icon: "error",
          confirmButtonText: "Aceptar",
        });
      }
    },

    sendBuy(e) {
      e.preventDefault();
      if (this.subtotal_price != 0) {
        let date = new Date();
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, "0");
        const day = String(date.getDate()).padStart(2, "0");

        const hours = String(date.getHours()).padStart(2, "0");
        const minutes = String(date.getMinutes()).padStart(2, "0");
        const seconds = String(date.getSeconds()).padStart(2, "0");
        let hour = `${hours}:${minutes}:${seconds}`;
        let dateSale = `${year}-${month}-${day}`;
        let user = JSON.parse(localStorage.getItem("userData"));
        let saleData = {
          user_id: parseInt(user.id),
          total: this.totalPrice,
          date: dateSale,
          hour: hour,
          payment_method: this.pay,
        };

        const saveProducts = (saleId) => {
          this.cart.forEach((product) => {
            console.log(typeof saleId);
            console.log(typeof product.id);
            console.log(typeof product.quantity);
            axios
              .post("http://127.0.0.1:8000/api/store_sales_product", {
                sale_id: saleId,
                product_id: product.id,
                quantity: product.quantity,
              })
              .then(() => {})
              .catch((err) => {
                alert(err);
              });
          });
        };

        if (this.pay == "card") {
          let cardVerify = this.validateCreditCard(this.cardNumber);

          if (cardVerify != true) {
            this.messageResponse("Failed");
          } else {
            axios
              .post("http://127.0.0.1:8000/api/store_sale", saleData)
              .then((response) => {
                this.messageResponse("success");

                const saleId = response.data.sale_id;
                saveProducts(saleId);
                localStorage.removeItem('cart');
              });
          }
        } else {
          axios
            .post("http://127.0.0.1:8000/api/store_sale", saleData)
            .then((response) => {
              this.messageResponse("success");

              const saleId = response.data.sale_id;
              saveProducts(saleId);
              localStorage.removeItem('cart');
            });
        }
      } else {
        this.messageResponse("success", "Carrito vacío");
      }
    },
  },

  computed: {
    subtotal_price() {
      if (this.check === "free") {
        return this.totalSubtotal;
      } else if (this.check === "shopping") {
        return this.totalSubtotal * 1.2;
      } else {
        return this.totalSubtotal;
      }
    },
    message() {
      if (this.check === "free") {
        return "Gratis";
      } else if (this.check === "shopping") {
        return "20% de recargo";
      } else {
        return "Gratis";
      }
    },
    totalPrice() {
      return this.subtotal_price;
    },
    dataCard() {
      if (this.pay === "card") {
        return "Card";
      } else {
        return "Cash";
      }
    },
  },
};
</script>
