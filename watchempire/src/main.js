import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import '../src/assets/globals.css';
import App from "./App.vue";





//Componentes
import HomeComponent from "../src/components/HomeComponent.vue";
import ContactComponent from "../src/components/ContactComponent.vue";
import StoreComponent from "../src/components/StoreComponent.vue";

//Rutas
const routes = [
  { path: "/", component: HomeComponent },
  { path: "/contacto", component: ContactComponent },
  { path: "/tienda", component: StoreComponent }
];

//Crear objeto rutas
const router = createRouter({
  history: createWebHistory(),
  routes,
});



const app = createApp(App);
app.use(router);

app.mount("#app");

{/* <img class="absolute left-1/2 transform -translate-x-1/2 w-full h-64" src="../../assets/img/Count.jpg" /> */}