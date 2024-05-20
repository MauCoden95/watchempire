import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import '../src/assets/globals.css';
import App from "./App.vue";





//Componentes
import HomeComponent from "../src/components/HomeComponent.vue";
import ContactComponent from "../src/components/ContactComponent.vue";
import StoreComponent from "../src/components/StoreComponent.vue";
import CartComponent from '../src/components/CartComponent.vue';
import RegisterComponent from '../src/components/RegisterComponent.vue';
import ProductoDetailComponent from '../src/components/ProductDetailComponent.vue';
import MyDesiredsComponent from '../src/components/MyDesiredsComponent.vue'

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
  { path: "/mis-deseados", component: MyDesiredsComponent }
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