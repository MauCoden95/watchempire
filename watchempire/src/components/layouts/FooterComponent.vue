<template>
  <footer class="w-full min-h-0 lg:min-h-[34rem] bg-zinc-950 p-0.5">
    <div class="w-5/6 h-36 m-auto">
      <div class="w-full h-28 mt-14 flex flex-col md:flex-row gap-16">
        <div class="w-full md:w-2/4 h-full flex flex-col items-start justify-center">
          <h3 class="text-cyan-600 text-3xl">Newsletter</h3>
          <p class="lg:text-xl mt-3 text-justify text-white">
            Únete a nuestro newsletter y mantente al tanto de las últimas
            tendencias en relojería. Suscríbete ahora y deja que el tiempo te
            sorprenda con estilo
          </p>
        </div>

        <div class="w-full md:w-2/4 h-full flex flex-col items-start justify-center">
          <div class="w-full h-12 lg:h-16 flex border-2 border-cyan-600 rounded-sm">
            <input
              class="w-4/6 h-full p-3"
              type="email"
              placeholder="Ingrese su email..."
            />
            <button
              class="w-2/6 h-full text-base lg:text-2xl duration-300 bg-cyan-600 hover:bg-cyan-400"
            >
              Suscribirse
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="w-5/6 h-auto m-auto mt-32 lg:mt-5 mb-5 pb-12 flex flex-col md:grid md:grid-cols-2 md:grid-rows-2 lg:flex lg:flex-row gap-5">
      <div class="w-full lg:w-3/12 h-full text-white">
        <h3 class="logo text-2xl">WatchEmpire</h3>
        <p class="w-full text-justify">
          Explora nuestra colección de relojes exquisitos. Elegancia y precisión
          para cada momento. ¡Encuentra tu estilo hoy!
        </p>
        <ul class="mt-5">
          <li class="text-white">
            <i class="fas fa-map-marker mr-3"></i>Av. Lorem Ipsum 3400 - CABA
          </li>
          <li class="text-white">
            <i class="fas fa-phone mr-3"></i>(54 11) 9999-9999
          </li>
          <li class="text-white">
            <i class="fas fa-envelope mr-3"></i>watchempire@email.com
          </li>
        </ul>
        <div class="w-full h-auto flex items-start mt-4">
          <i
            class="fab fa-facebook text-2xl mr-3 cursor-pointer hover:text-cyan-500"
          ></i>
          <i
            class="fab fa-twitter text-2xl mr-3 cursor-pointer hover:text-cyan-500"
          ></i>
          <i
            class="fab fa-youtube text-2xl mr-3 cursor-pointer hover:text-cyan-500"
          ></i>
          <i
            class="fab fa-linkedin text-2xl mr-3 cursor-pointer hover:text-cyan-500"
          ></i>
        </div>
      </div>

      <div class="w-full lg:w-3/12 h-full text-white lg:ml-8">
        <h3 class="w-3/4 lg:m-auto text-2xl text-cyan-600 lg:mb-5">Posts</h3>
        <div class="w-3/4 h-auto lg:m-auto mt-3 flex items-center">
          <img class="w-2/6 h-16" src="../../assets/img/cartierwatch.jpg" />
          <h3 class="ml-4">
            <a class="cursor-pointer hover:text-cyan-500"
              >Lorem ipsum dolor sit amet</a
            >
          </h3>
        </div>
        <div class="w-3/4 h-auto lg:m-auto mt-3 flex items-center">
          <img class="w-2/6 h-16" src="../../assets/img/fitronwatch.jpg" />
          <h3 class="ml-4">
            <a class="cursor-pointer hover:text-cyan-500"
              >Lorem ipsum dolor sit amet</a
            >
          </h3>
        </div>
      </div>

      <div class="w-full lg:w-3/12 h-full text-white">
        <h3 class="w-full text-2xl lg:text-center text-cyan-600">Enlaces útiles</h3>
        <div class="w-full h-auto mt-3 flex items-end lg:justify-end">
          <ul class="w-3/4">
            <li class="my-2">
              <a class="cursor-pointer hover:text-cyan-500 text-sm"
                >Política de privacidad</a
              >
            </li>
            <li class="my-2">
              <a class="cursor-pointer hover:text-cyan-500 text-sm">Nosotros</a>
            </li>
            <li class="my-2">
              <a class="cursor-pointer hover:text-cyan-500 text-sm">Contactános</a>
            </li>
            <li class="my-2">
              <a class="cursor-pointer hover:text-cyan-500 text-sm"
                >Términos y condiciones</a
              >
            </li>
            <li class="my-2">
              <a class="cursor-pointer hover:text-cyan-500 text-sm"
                >Preguntas frecuentes</a
              >
            </li>
            <li class="my-2">
              <a class="cursor-pointer hover:text-cyan-500 text-sm"
                >Envíos y devoluciones</a
              >
            </li>
          </ul>
        </div>
      </div>

      <div class="w-full lg:w-3/12 h-full text-white">
        <h3 class="w-full lg:m-auto lg:text-right text-2xl text-cyan-600">Atención al cliente</h3>
        <div class="w-full h-auto mt-3 flex items-center">
          <ul class="w-auto lg:m-auto">
            <li class="my-2">
              <a class="cursor-pointer hover:text-cyan-500 text-sm">Centro de ayuda</a>
            </li>
            <li class="my-2">
              <a class="cursor-pointer hover:text-cyan-500 text-sm">Chat en vivo</a>
            </li>
            <li class="my-2">
              <a class="cursor-pointer hover:text-cyan-500 text-sm">Soporte técnico</a>
            </li>
            <li class="my-2">
              <a class="cursor-pointer hover:text-cyan-500 text-sm">Feedback</a>
            </li>
            <li class="my-2">
              <a class="cursor-pointer hover:text-cyan-500 text-sm"
                >Informar un problema</a
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "FooterComponent",
};
</script>
