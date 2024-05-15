<template>
  <section>
    <h1 class="text-4xl text-center my-12">Contacto</h1>
    <div class="w-5/6 min-h-0 m-auto mb-12 pb-8 flex flex-col lg:flex-row">
      <div class="w-full lg:w-3/5 h-full lg:px-5 lg:border-r-2 lg:border-gray-400">
        <h3 class="text-2xl text-center my-4">Enviar mensaje</h3>
        <p class="text-justify">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a purus
          id ex rhoncus dictum. Integer viverra luctus elementum.
        </p>
        <div
          class="w-full h-full mt-5 grid grid-cols-1 lg:grid-cols-2 lg:grid-rows-2 gap-4"
        >
          <div>
            <label
              for="input-group-1"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Nombre</label
            >
            <div class="relative mb-6">
              <div
                class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
              >
                <i class="fas fa-user"></i>
              </div>
              <input
                type="text"
                id="input-group-1"
                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                placeholder="correo@mail.com"
              />
            </div>
          </div>

          <div>
            <label
              for="input-group-1"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Teléfono</label
            >
            <div class="relative mb-6">
              <div
                class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
              >
                <i class="fas fa-phone"></i>
              </div>
              <input
                type="text"
                id="input-group-1"
                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                placeholder="correo@mail.com"
              />
            </div>
          </div>

          <div>
            <label
              for="input-group-1"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Correo electrónico</label
            >
            <div class="relative mb-6">
              <div
                class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
              >
                <i class="fas fa-envelope"></i>
              </div>
              <input
                type="text"
                id="input-group-1"
                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                placeholder="correo@mail.com"
              />
            </div>
          </div>

          <div>
            <label
              for="input-group-1"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Asunto</label
            >
            <div class="relative mb-6">
              <div
                class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none"
              >
                <i class="fas fa-pencil-alt"></i>
              </div>
              <input
                type="text"
                id="input-group-1"
                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                placeholder="correo@mail.com"
              />
            </div>
          </div>
        </div>

        <div class="w-full min-h-0">
          <label
            for="input-group-1"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Mensaje</label
          >
          <textarea class="w-full h-44 p-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"></textarea>
            <button class="float-right bg-black hover:bg-gray-900 mt-5 text-white text-xl rounded py-3 px-8"><i class="fas fa-arrow-right"></i> Enviar</button>
        </div>
      </div>

      <div class="w-full lg:w-2/5 h-full mt-12 lg:mt-0 px-5 flex flex-col items-center justify-between">
        <div class="w-full min-h-0 mb-12">
            <h3 class="text-xl my-3">llamanos</h3>
            <p class="text-sm text-gray-700 mb-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a purus id ex rhoncus dictum. Integer viverra luctus elementum.
            </p>
            <p class="text-orange-800 flex items-center font-bold"><i class="w-9 h-9 leading-9 text-center mr-3 fas fa-phone border border-orange-500 bg-orange-400 rounded-full"></i> (54 11) 9999-9999</p>            
        </div>

        <div class="w-full min-h-0 mb-12">
            <h3 class="text-xl my-3">Visitanos</h3>
            <p class="text-sm text-gray-700 mb-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a purus id ex rhoncus dictum. Integer viverra luctus elementum.
            </p>
            <p class="text-orange-800 flex items-center font-bold"><i class="w-9 h-9 leading-9 text-center mr-3 fas fa-location border border-orange-500 bg-orange-400 rounded-full"></i> Av. Lorem Ipsum 3400 - CABA</p>            
        </div>

        <div class="w-full min-h-0">
            <h3 class="text-xl my-3">Chat en vivo</h3>
            <p class="text-sm text-gray-700 mb-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a purus id ex rhoncus dictum. Integer viverra luctus elementum.
            </p>
            <p class="text-orange-800 flex items-center font-bold"><i class="w-9 h-9 leading-9 text-center mr-3 fas fa-video border border-orange-500 bg-orange-400 rounded-full"></i> Live chat</p>            
        </div>
      </div>  
    </div>

    
  
    <iframe class="w-5/6 h-44 lg:h-64 m-auto my-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26265.10627243174!2d-58.3958528!3d-34.6259456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccad68fbbfe49%3A0x690c1074e08ab743!2sBelgrano!5e0!3m2!1ses-419!2sar!4v1715694894905!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  
    <div class="w-5/6 min-h-0 m-auto mt-28 mb-12 pb-8 flex flex-col lg:flex-row justify-between">
        <h2 class="text-3xl text-center lg:text-left lg:text-4xl">
            Preguntas frecuentes
        </h2>
        <div class="w-full lg:w-3/6 min-h-0 mt-12 lg:mt-0">
            <div @click="toggleAcc1" class="w-full h-16 duration-300 hover:bg-gray-100 border-b border-gray-800 px-8 cursor-pointer flex items-center justify-between">
                <h3 class="text-sm md:text-xl">¿Cuál es su política de devolución?</h3>
                <i :class="{ 'fa-minus': acc1, 'fa-plus': !acc1 }" class="fas text-base lg:text-2xl"></i>
            </div>
            <div id="acc1" :class="{ 'acc1Show': acc1, 'acc1Hidden': !acc1 }" class="bg-stone-200 mb-2">
                <p class="p-3">Aceptamos devoluciones dentro de los 30 días posteriores a la compra, siempre que el reloj esté en su estado original.</p>
            </div>
            <div @click="toggleAcc2" class="w-full h-16 duration-300 hover:bg-gray-100 border-b border-gray-800 px-8 cursor-pointer flex items-center justify-between">
                <h3 class="text-sm md:text-xl">¿Cómo puedo seguir mi pedido?</h3>
                <i :class="{ 'fa-minus': acc2, 'fa-plus': !acc2 }" class="fas text-base lg:text-2xl"></i>
            </div>
            <div id="acc2" :class="{ 'acc2Show': acc2, 'acc2Hidden': !acc2 }" class="bg-stone-200 mb-2">
                <p class="p-3">Una vez que tu pedido sea enviado, recibirás un correo electrónico con un enlace de seguimiento para rastrear tu paquete en tiempo real.</p>
            </div>
            <div @click="toggleAcc3" class="w-full h-16 duration-300 hover:bg-gray-100 border-b border-gray-800 px-8 cursor-pointer flex items-center justify-between">
                <h3 class="text-sm md:text-xl">¿Ofrecen garantía en sus relojes?</h3>
                <i :class="{ 'fa-minus': acc3, 'fa-plus': !acc3 }" class="fas text-base lg:text-2xl"></i>
            </div>
            <div id="acc3" :class="{ 'acc3Show': acc3, 'acc3Hidden': !acc3 }" class="bg-stone-200">
                <p class="p-3">Sí, todos nuestros relojes vienen con una garantía de un año que cubre defectos de fabricación.</p>
            </div>
        </div>
    </div>
  </section>
</template>

<script>
import "preline/preline";

export default {
  name: "ContactComponent",
  data() {
    return {
        acc1: false,
        acc2: false,
        acc3: false
    };
  },
  mounted() {
    
  },
  methods: {
    toggleAcc1(){
        this.acc1 = !this.acc1; 
        this.acc2 = false;
        this.acc3 = false;
    },
    toggleAcc2(){
        this.acc2 = !this.acc2;
        this.acc1 = false;
        this.acc3 = false;
    },
    toggleAcc3(){
        this.acc3 = !this.acc3;
        this.acc1 = false;
        this.acc2 = false;
    }
  },
};
</script>


<style>
.acc1Hidden{
    transition: all 600ms;
    max-height: 1px;
    overflow: hidden;
}
.acc1Show{
    transition: all 600ms;
    max-height: 100px;
    overflow: hidden;
}
.acc2Hidden{
    transition: all 600ms;
    max-height: 1px;
    overflow: hidden;
}
.acc2Show{
    transition: all 600ms;
    max-height: 100px;
    overflow: hidden;
}
.acc3Hidden{
    transition: all 600ms;
    max-height: 1px;
    overflow: hidden;
}
.acc3Show{
    transition: all 600ms;
    max-height: 100px;
    overflow: hidden;
}
</style>
