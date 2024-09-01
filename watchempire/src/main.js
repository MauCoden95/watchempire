import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import '../src/assets/globals.css';
import App from "./App.vue";





//Componentes
import HomeComponent from "../src/components/routes/HomeComponent.vue";
import ContactComponent from "../src/components/routes/ContactComponent.vue";
import StoreComponent from "../src/components/routes/StoreComponent.vue";
import CartComponent from '../src/components/routes/CartComponent.vue';
import RegisterComponent from '../src/components/routes/RegisterComponent.vue';
import ProductoDetailComponent from '../src/components/routes/ProductDetailComponent.vue';
import MyDesiredsComponent from '../src/components/routes/MyDesiredsComponent.vue'
import MyPurchasesComponent from '../src/components/routes/MyPurchasesComponent.vue'
import DetailPurchaseComponent from '../src/components/routes/DetailPurchaseComponent.vue';


import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

//Rutas
const routes = [
  { path: "/", component: HomeComponent },
  { path: "/contacto", component: ContactComponent },
  { path: "/tienda", component: StoreComponent },
  { path: "/carrito", component: CartComponent },
  { path: "/registro", component: RegisterComponent },
  { path: "/producto/:id", component: ProductoDetailComponent },
  { path: "/mis-deseados", component: MyDesiredsComponent },
  { path: "/mis-compras", component: MyPurchasesComponent },
  { path: "/detalle-compra", component: DetailPurchaseComponent },
];

//Crear objeto rutas
const router = createRouter({
  history: createWebHistory(),
  routes,
});



const app = createApp(App);
app.use(router);

app.use(VueSweetalert2);

app.mount("#app");

{/* <img class="absolute left-1/2 transform -translate-x-1/2 w-full h-64" src="../../assets/img/Count.jpg" /> */}