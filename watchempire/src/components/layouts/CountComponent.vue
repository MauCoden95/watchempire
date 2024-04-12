<template>
  <section class="count w-full h-64">
    <div class="count_div w-full h-full">
      <div class="w-5/6 h-full m-auto bg-transparent flex items-center justify-between">
        <h3 class="text-3xl text-white">Descuento del <span class="text-cyan-600">30%</span> en todos los productos</h3>
        <div class="w-96 h-24 border-4 border-cyan-600 flex items-center justify-around">
          <h3 class="text-2xl text-white text-center">
            {{ days }}
            <span class="block text-sm text-cyan-600">Días</span>
          </h3>
          <span class="text-white text-2xl">:</span>
          <h3 class="text-2xl text-white text-center">
            {{ hours }}
            <span class="block text-sm text-cyan-600">Horas</span>
          </h3>
          <span class="text-white text-2xl">:</span>
          <h3 class="text-2xl text-white text-center">
            {{ minutes }}
            <span class="block text-sm text-cyan-600">Minutos</span>
          </h3>
          <span class="text-white text-2xl">:</span>
          <h3 class="text-2xl text-white text-center">
            {{ seconds }}
            <span class="block text-sm text-cyan-600">Segundos</span>
          </h3>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'CountComponent',
  data() {
    return {
      days: 0,
      hours: 0,
      minutes: 0,
      seconds: 0
    };
  },
  mounted() {
    const futureDate = new Date('2024-04-15T23:59:59'); 

    
    setInterval(() => {
      const currentDate = new Date();
      const difference = futureDate - currentDate;

      this.days = Math.floor(difference / (1000 * 60 * 60 * 24));
      this.hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      this.minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
      this.seconds = Math.floor((difference % (1000 * 60)) / 1000);
    }, 1000);
  }
};
</script>
