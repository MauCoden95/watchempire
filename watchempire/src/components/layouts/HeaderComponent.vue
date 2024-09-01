<template>
  <header class="w-full h-20 bg-zinc-950">
    <div class="relative w-5/6 h-full m-auto flex items-center justify-between">
      <router-link to="/" class="logo text-md md:text-xl lg:text-2xl text-white"
        >WatchEmpire <i class="fas fa-clock"></i
      ></router-link>

      <nav
        id="nav"
        :class="{ showMenu: nav, hiddenMenu: !nav }"
        class="fixed md:relative top-0 right-0 left-0 bottom-0 w-screen h-screen md:w-4/6 md:h-20 md:ml-16 z-40 bg-gray-300 md:bg-transparent"
      >
      
        <ul
          class="absolute w-5/6 h-full py-3 px-3 mb-3 flex flex-col md:flex-row items-center justify-start md:justify-between"
        >
          <button id="btn_menu" @click="toggleMenu" class="block absolute top-24 right-3">
            <i
              class="block md:hidden fas fa-times text-black hover:text-cyan-700 duration-300 text-4xl"
            ></i>
          </button>
          <li
            class="cursor-pointer w-full md:w-auto mb-5 md:mb-0 ml-7 md:ml-0 text-left hover:text-cyan-600 duration-300 py-3"
          >
            <router-link
              to="/"
              @click="toggleMenu"
              class="text-2xl md:text-xs lg:text-base text-black md:text-white hover:text-cyan-600"
              >Inicio</router-link
            >
          </li>

          <li
            class="cursor-pointer w-full md:w-auto mb-5 md:mb-0 ml-7 md:ml-0 text-left hover:text-cyan-600 duration-300 py-3"
          >
            <router-link
              to="/tienda"
              @click="toggleMenu"
              class="text-2xl md:text-xs lg:text-base text-black md:text-white hover:text-cyan-600"
              >Tienda</router-link
            >
          </li>

          <li
            class="cursor-pointer w-full md:w-auto mb-5 md:mb-0 ml-7 md:ml-0 text-left hover:text-cyan-600 duration-300 py-3"
          >
            <router-link
              to="/"
              @click="toggleMenu"
              class="text-2xl md:text-xs lg:text-base text-black md:text-white hover:text-cyan-600"
              >Blog</router-link
            >
          </li>

          <li
            class="cursor-pointer w-full md:w-auto mb-5 md:mb-0 ml-7 md:ml-0 text-left hover:text-cyan-600 duration-300 py-3"
          >
            <router-link
              to="/contacto"
              @click="toggleMenu"
              class="text-2xl md:text-xs lg:text-base text-black md:text-white hover:text-cyan-600"
              >Contacto</router-link
            >
          </li>
        </ul>
      </nav>

      <button class="absolute right-0" @click="toggleUser">
        <i
          class="fas fa-user text-white hover:text-cyan-600 duration-300 text-xl md:text-xl lg:text-2xl"
        ></i>
      </button>

      <button id="btn_menu" @click="toggleMenu" class="block md:hidden">
        <i
          class="block md:hidden fas fa-bars text-white hover:text-cyan-600 duration-300 text-2xl"
        ></i>
      </button>

      <div v-if="isLogged">
        <div
          :class="{ showUser: btnUser, hiddenUser: !btnUser }"
          class="login absolute top-full right-0 w-60 h-auto bg-gray-200 rounded-lg"
        >
          <h3 class="text-center my-3">Bienvenido, {{user.name}}</h3>
            <router-link @click="btnUser = false"
              to="/mis-deseados"
              class="block w-5/6 m-auto my-3 text-xl rounded-lg bg-gray-300 hover:bg-gray-400 duration-300 text-center p-3"
              >Mis deseados</router-link
            >
           <router-link @click="btnUser = false"
              to="/carrito"
              class="block w-5/6 m-auto my-3 text-xl rounded-lg bg-gray-300 hover:bg-gray-400 duration-300 text-center p-3"
              >Mi carrito</router-link
            >
             <router-link @click="btnUser = false"
              to="/mis-compras"
              class="block w-5/6 m-auto my-3 text-xl rounded-lg bg-gray-300 hover:bg-gray-400 duration-300 text-center p-3"
              >Mis compras</router-link
            >
          <button
            @click="handleLogout"
            class="block w-5/6 m-auto my-3 text-xl rounded-lg bg-red-600 hover:bg-red-800 duration-300 text-center p-3"
          >
            Cerrar Sesión
          </button>
        </div>
      </div>
      <div v-else>
        <form
          @submit.prevent="handleSubmit"
          :class="{ showUser: btnUser, hiddenUser: !btnUser }"
          class="login absolute top-full right-0 w-60 h-auto bg-gray-200 rounded-lg"
        >
          <h2 class="text-center text-2xl my-1">Login</h2>
          <input
            v-model="data.email"
            class="block w-5/6 m-auto my-2 border border-gray-400 py-1 px-2"
            type="text"
            placeholder="Correo electrónico"
          />
          <input
            v-model="data.password"
            class="block w-5/6 m-auto my-2 border border-gray-400 py-1 px-2"
            type="password"
            placeholder="Contraseña"
          />
          <input
            class="cursor-pointer block w-5/6 m-auto my-2 duration-300 border bg-cyan-400 hover:bg-cyan-600 py-1 px-2"
            type="submit"
          />
          <h3 class="mt-4 mb-2 text-center">¿No tiene cuenta?</h3>
          <router-link
            @click="btnUser = false"
            class="block w-auto text-center mb-3 text-cyan-900 hover:text-cyan-600 duration-300"
            to="/registro"
            >Registrese acá</router-link
          >

          
        
             
        </form>
      </div>
    </div>
  </header>
</template>

<script>
import axios from "axios";

export default {
  name: "HeaderComponent",
  data() {
    return {
      nav: false,
      btnUser: false,
      data: {
        email: "",
        password: "",
      },
      isLogged: false,
      user: {}
    };
  },
  mounted() {
    if (window.innerWidth >= 768) {
      this.nav = true;
    }

    if (localStorage.getItem("userData")) {
      this.isLogged = true;
      this.user = JSON.parse(localStorage.getItem("userData"));
    }
  },
  methods: {
    toggleMenu() {
      this.nav = !this.nav;
    },
    toggleUser() {
      this.btnUser = !this.btnUser;
    },
    handleSubmit() {
      console.log(this.data);
      if (this.data.email == "" || this.data.password == "") {
        this.$swal({
          title: "Error!",
          text: "Campos vacíos",
          icon: "error",
          confirmButtonText: "Aceptar",
        });
      } else {
        axios
          .post("http://127.0.0.1:8000/api/login", this.data)
          .then((response) => {
            if (response.data.status == 200) {
              this.$swal.fire({
                text: response.message,
                title: "Login exitoso!!!",
                icon: "success",
              });

              localStorage.setItem("token", response.data.token);
              const userData = JSON.stringify(response.data.user);
              localStorage.setItem("userData", userData);
              setTimeout(() => {
                this.$router.go("/");
              }, 1000);
            } else {
              this.$swal.fire({
                title: "Error",
                text: "Credenciales incorrectas",
                icon: "error",
                confirmButtonText: "Aceptar",
              });
            }
          });
      }
    },
    handleLogout() {
      this.btnUser = false;
      localStorage.removeItem("token");
      localStorage.removeItem("userData");
      localStorage.removeItem("cart");
      this.isLogged = false;
      this.$router.go("/");
    },
  },
};
</script>

<style>
.hiddenMenu {
  transition: all 600ms;
  transform: translateX(100%);
}
.showMenu {
  transition: all 600ms;
  transform: translateX(8%);
}
.hiddenUser {
  transition: all 600ms;
  clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
}
.showUser {
  transition: all 600ms;
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
}


@media (min-width: 768px){
  .hiddenMenu {
      transform: translate(0%);
  }

  .showMenu {
      transform: translate(0%);
  }
}

</style>
