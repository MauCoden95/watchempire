<template>
  <section>
    <h1 class="text-4xl text-center my-12">Contacto</h1>
    <div class="w-5/6 min-h-0 m-auto mb-12 pb-8 flex">
      <div class="w-3/5 h-full px-5 border-r-2 border-gray-400">
        <h3 class="text-2xl text-center my-4">Enviar mensaje</h3>
        <p class="">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a purus
          id ex rhoncus dictum. Integer viverra luctus elementum.
        </p>
        <div
          class="w-full h-full mt-5 grid grid-cols-2 grid-rows-2 gap-4"
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
            >Asunto</label
          >
          <textarea class="w-full h-44 p-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"></textarea>
            <button class="float-right bg-black hover:bg-gray-900 mt-5 text-white text-xl rounded py-3 px-8"><i class="fas fa-arrow-right"></i> Enviar</button>
        </div>
      </div>
    </div>

    
  
    <iframe class="w-5/6 m-auto my-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26265.10627243174!2d-58.3958528!3d-34.6259456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccad68fbbfe49%3A0x690c1074e08ab743!2sBelgrano!5e0!3m2!1ses-419!2sar!4v1715694894905!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  
    <div class="w-5/6 min-h-0 m-auto my-12 pb-8 flex justify-between">
        <h2 class="text-5xl">
            Preguntas frecuentes
        </h2>
        <div class="w-3/6 min-h-0">
            <div @click="toggleAcc1" class="w-full h-16 duration-300 bg-cyan-400 hover:bg-cyan-300 px-8 rounded-t-lg cursor-pointer flex items-center justify-between">
                <h3 class="text-xl">¿Cuál es su política de devolución?</h3>
                <i class="fas fa-arrow-circle-down text-2xl"></i>
            </div>
            <div id="acc1" :class="{ 'acc1Show': acc1, 'acc1Hidden': !acc1 }" class="bg-stone-200">
                <p class="p-3">Aceptamos devoluciones dentro de los 30 días posteriores a la compra, siempre que el reloj esté en su estado original.</p>
            </div>
            <div @click="toggleAcc2" class="w-full h-16 duration-300 bg-cyan-400 hover:bg-cyan-300 px-8 rounded-t-lg cursor-pointer flex items-center justify-between">
                <h3 class="text-xl">¿Cómo puedo seguir mi pedido?</h3>
                <i class="fas fa-arrow-circle-down text-2xl"></i>
            </div>
            <div id="acc2" :class="{ 'acc2Show': acc2, 'acc2Hidden': !acc2 }" class="bg-stone-200">
                <p class="p-3">Una vez que tu pedido sea enviado, recibirás un correo electrónico con un enlace de seguimiento para rastrear tu paquete en tiempo real.</p>
            </div>
            <div @click="toggleAcc3" class="w-full h-16 duration-300 bg-cyan-400 hover:bg-cyan-300 px-8 rounded-t-lg cursor-pointer flex items-center justify-between">
                <h3 class="text-xl">¿Ofrecen garantía en sus relojes?</h3>
                <i class="fas fa-arrow-circle-down text-2xl"></i>
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
