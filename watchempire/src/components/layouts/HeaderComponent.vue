<template>
  <header class="w-full h-20 bg-zinc-950">
    <div class="relative w-5/6 h-full m-auto flex items-center justify-between">
      <router-link to="/" class="logo text-md md:text-xl lg:text-2xl text-white"
        >WatchEmpire <i class="fas fa-clock"></i
      ></router-link>

      <nav
        id="nav"
        :class="{ 'showMenu': nav, 'hiddenMenu': !nav }"
        class="md:block absolute top-full md:relative md:top-0 w-full md:w-2/4 h-68 md:h-full"
      >
        <ul
          class="w-full h-full bg-zinc-950 py-3 px-3 mb-3 flex flex-col md:flex-row items-center justify-between"
        >
          <li
            class="cursor-pointer w-full md:w-auto text-center hover:text-cyan-600 duration-300 py-3"
          >
            <router-link
              to="/"
              class="text-xl md:text-xs lg:text-base text-white hover:text-cyan-600"
              >Inicio</router-link
            >
          </li>

          <li
            class="cursor-pointer w-full md:w-auto text-center hover:text-cyan-600 duration-300 py-3"
          >
            <router-link
              to="/"
              class="text-xl md:text-xs lg:text-base text-white hover:text-cyan-600"
              >Tienda</router-link
            >
          </li>
          <li
            class="cursor-pointer w-full md:w-auto text-center hover:text-cyan-600 duration-300 py-3"
          >
            <router-link
              to="/"
              class="text-xl md:text-xs lg:text-base text-white hover:text-cyan-600"
              >Categorías</router-link
            >
          </li>

          <li
            class="cursor-pointer w-full md:w-auto text-center hover:text-cyan-600 duration-300 py-3"
          >
            <router-link
              to="/"
              class="text-xl md:text-xs lg:text-base text-white hover:text-cyan-600"
              >Blog</router-link
            >
          </li>

          <li
            class="cursor-pointer w-full md:w-auto text-center hover:text-cyan-600 duration-300 py-3"
          >
            <router-link
              to="/contacto"
              class="text-xl md:text-xs lg:text-base text-white hover:text-cyan-600"
              >Contacto</router-link
            >
          </li>
        </ul>
      </nav>

      <button @click="toggleUser"> 
        <i
          class="fas fa-user text-white hover:text-cyan-600 duration-300 text-xl md:text-xl lg:text-2xl"
        ></i>
      </button>

      

      <button id="btn_menu" @click="toggleMenu" class="block md:hidden">
        <i
          class="block md:hidden fas fa-bars text-white hover:text-cyan-600 duration-300 text-2xl"
        ></i>
      </button>

      <div :class="{ 'showUser': btnUser, 'hiddenUser': !btnUser }" class="absolute top-full right-0 w-60 h-auto bg-gray-200 rounded-lg">
          <h2 class="text-center text-2xl my-1">Login</h2>
          <input class="block w-5/6 m-auto my-2 border border-gray-400 py-1 px-2" type="text" placeholder="Correo electrónico"/>
          <input class="block w-5/6 m-auto my-2 border border-gray-400 py-1 px-2" type="password" placeholder="Contraseña"/>
          <input class="cursor-pointer block w-5/6 m-auto my-2 duration-300 border bg-cyan-400 hover:bg-cyan-600 py-1 px-2" type="submit"/>
          <h3 class="mt-4 mb-2 text-center">¿No tiene cuenta?</h3>
          <a class="block w-auto text-center mb-3 text-cyan-900 hover:text-cyan-600 duration-300" href="#">Registrese acá</a>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "HeaderComponent",
  data() {
    return {
      nav: false,
      btnUser: false
    };
  },
  mounted() {
    if (window.innerWidth >= 768) {
       this.nav = true;
    }
  },
  methods: {
    toggleMenu() {
      this.nav = !this.nav;
    },
     toggleUser() {
      this.btnUser = !this.btnUser;  
    },
  },
};
</script>

<style>
.hiddenMenu{
    transition: all 600ms;
    clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
}
.showMenu{
    transition: all 600ms;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
}
.hiddenUser{
    transition: all 600ms;
    clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
}
.showUser{
    transition: all 600ms;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
}
</style>




