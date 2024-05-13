<template>
  <header class="w-full h-20 bg-zinc-950">
    <div class="relative w-5/6 h-full m-auto flex items-center justify-between">
      <router-link to="/" class="logo text-md md:text-xl lg:text-2xl text-white"
        >WatchEmpire <i class="fas fa-clock"></i
      ></router-link>

      <nav
        id="nav"
        class="hidden md:block absolute top-full md:relative md:top-0 w-full md:w-2/4 h-68 md:h-full"
      >
        <ul
          class="w-full h-full bg-zinc-950 py-3 px-3 mb-3 flex flex-col md:flex-row items-center justify-between"
        >
          <li
            class="cursor-pointer w-full md:w-auto duration-300 text-center hover:bg-zinc-700 py-3"
          >
            <router-link
              to="/"
              class="text-xl md:text-xs lg:text-base text-white hover:text-cyan-600"
              >Inicio</router-link
            >
          </li>

          <li
            class="cursor-pointer w-full md:w-auto duration-300 text-center hover:bg-zinc-700 py-3"
          >
            <router-link
              to="/"
              class="text-xl md:text-xs lg:text-base text-white hover:text-cyan-600"
              >Tienda</router-link
            >
          </li>
          <li
            class="cursor-pointer w-full md:w-auto duration-300 text-center hover:bg-zinc-700 py-3"
          >
            <router-link
              to="/"
              class="text-xl md:text-xs lg:text-base text-white hover:text-cyan-600"
              >Categorías</router-link
            >
          </li>

          <li
            class="cursor-pointer w-full md:w-auto duration-300 text-center hover:bg-zinc-700 py-3"
          >
            <router-link
              to="/"
              class="text-xl md:text-xs lg:text-base text-white hover:text-cyan-600"
              >Blog</router-link
            >
          </li>

          <li
            class="cursor-pointer w-full md:w-auto duration-300 text-center hover:bg-zinc-700 py-3"
          >
            <router-link
              to="/"
              class="text-xl md:text-xs lg:text-base text-white hover:text-cyan-600"
              >Contacto</router-link
            >
          </li>
        </ul>
      </nav>

      <button>
        <i
          class="fas fa-user text-white hover:text-cyan-600 duration-300 text-xl md:text-xl lg:text-2xl"
        ></i>
      </button>

      <button id="btn_menu" @click="toggleMenu">
        <i
          class="block md:hidden fas fa-bars text-white hover:text-cyan-600 duration-300 text-xl"
        ></i>
      </button>
    </div>
  </header>
</template>

<script>
export default {
  name: "HeaderComponent",
  data() {
    return {
      nav: null,
    };
  },
  mounted() {
    this.nav = document.getElementById("nav");
  },
  methods: {
    toggleMenu() {
      this.nav.classList.toggle("hidden");
    },
  },
};
</script>

<style>
.hidden {
    transition: all 300ms;
}
</style>
