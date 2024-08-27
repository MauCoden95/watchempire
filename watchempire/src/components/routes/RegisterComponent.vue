<template>
  <div class="bg-gray-50 p-[1px]">
    <h2 class="text-4xl text-center my-16">Registro</h2>
    <section
      class="w-full lg:w-5/6 min-h-0 lg:min-h-0 lg:py-20 m-auto mb-12 flex flex-col lg:flex-row gap-2 items-start justify-between"
    >
      <form
        @submit.prevent="handleSubmit"
        class="w-full lg:w-3/6 h-auto flex flex-col items-center"
      >
        <input
          v-model="form.name"
          class="w-5/6 my-3 py-3 px-2 bg-gray-300 placeholder-gray-500 text-gray-800"
          type="text"
          placeholder="Nombre completo..."
        />
        <input
          v-model="form.email"
          class="w-5/6 my-3 py-3 px-2 bg-gray-300 placeholder-gray-500 text-gray-800"
          type="email"
          placeholder="Correo Electrónico..."
        />
        <input
          v-model="form.dni"
          class="w-5/6 my-3 py-3 px-2 bg-gray-300 placeholder-gray-500 text-gray-800"
          type="number"
          placeholder="Documento..."
        />
        <input
          v-model="form.address"
          class="w-5/6 my-3 py-3 px-2 bg-gray-300 placeholder-gray-500 text-gray-800"
          type="text"
          placeholder="Dirección..."
        />
        <input
          v-model="form.phone"
          class="w-5/6 my-3 py-3 px-2 bg-gray-300 placeholder-gray-500 text-gray-800"
          type="number"
          placeholder="Teléfono..."
        />
        <input
          v-model="form.password"
          class="w-5/6 my-3 py-3 px-2 bg-gray-300 placeholder-gray-500 text-gray-800"
          type="password"
          placeholder="Contraseña..."
        />
        <input
          v-model="form.confirmPassword"
          class="w-5/6 my-3 py-3 px-2 bg-gray-300 placeholder-gray-500 text-gray-800"
          type="password"
          placeholder="Confirmar Contraseña..."
        />
        <input
          class="w-5/6 cursor-pointer my-8 py-3 px-2 duration-300 bg-cyan-700 hover:bg-cyan-400"
          type="submit"
          value="Registrarse"
        />
      </form>

      <img
        class="w-full lg:w-2/5"
        src="../../assets/img/register-image.svg"
      />
    </section>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "RegisterComponent",
  data() {
    return {
      form: {
        name: "",
        email: "",
        dni: "",
        address: "",
        phone: "",
        password: "",
        confirmPassword: "",
      },
    };
  },
  methods: {
    handleSubmit() {
      console.log(this.form);
      if (
        this.form.name === "" ||
        this.form.email === "" ||
        this.form.dni === "" ||
        this.form.address === "" ||
        this.form.phone === "" ||
        this.form.password === "" ||
        this.form.confirmPassword === ""
      ) {
        this.$swal({
          title: "Error!",
          text: "Campos vacíos",
          icon: "error",
          confirmButtonText: "Aceptar",
        });
      } else if (
        this.form.password.length < 8 ||
        this.form.confirmPassword.length < 8
      ) {
        this.$swal.fire({
          title: "Error",
          text: "La contraseña debe tener al menos 8 caracteres",
          icon: "error",
          confirmButtonText: "Aceptar",
        });
      } else if (this.form.password !== this.form.confirmPassword) {
        this.$swal.fire({
          title: "Error",
          text: "Las contraseñas no coinciden",
          icon: "error",
          confirmButtonText: "Aceptar",
        });
      } else {
        axios
          .post("http://127.0.0.1:8000/api/register", this.form)
          .then((response) => {
            if (response.data.status === 200) {
              this.$swal.fire({
                text: response.data.message,
                title: "Registro exitoso!!!",
                icon: "success",
              });

              this.form.name = "";
              this.form.email = "";
              this.form.dni = "";
              this.form.address = "";
              this.form.phone = "";
              this.form.password = "";
              this.form.confirmPassword = "";
            } else {
              this.$swal.fire({
                title: "Error",
                text: "Error al Registrarse",
                icon: "error",
                confirmButtonText: "Aceptar",
              });
            }
          })
          .catch((error) => {
            this.$swal.fire({
              title: "Error",
              text: error,
              icon: "error",
              confirmButtonText: "Aceptar",
            });
          });
      }
    },
  },
};
</script>
