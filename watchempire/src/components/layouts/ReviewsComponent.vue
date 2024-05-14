<template>
  <section class="w-full min-h-[25rem] bg-zinc-800 p-0.5 pb-20">
    <div class="w-5/6 h-full m-auto mt-12 flex flex-col lg:flex-row items-center justify-evenly">
      <div class="w-full lg:w-2/4 h-full mb-5 flex flex-col items-start justify-center">
        <h3 class="text-white text-3xl mb-3">Que dicen nuestros clientes 😊</h3>
        <p class="text-white text-base">
          Explora opiniones genuinas de clientes satisfechos: la prueba de
          nuestra calidad y servicio excepcional
        </p>
        <div class="w-auto h-auto mt-5">
          <button
            @click="prevReview"
            class="bg-zinc-700 hover:bg-zinc-950 duration-300 text-white text-2xl mr-5 py-3 px-5"
          >
            <i class="fas fa-chevron-left"></i>
          </button>
          <button
            @click="nextReview"
            class="bg-zinc-700 hover:bg-zinc-950 duration-300 text-white text-2xl py-3 px-5"
          >
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>

      <div class="card w-full lg:w-2/4 h-64 p-5 bg-zinc-700 rounded" ref="cardElement">
        <p
          class="w-full h-4/6 text-justify border-b-2 pb-5 border-gray-300 text-white text-xs sm:text-base"
        >
          {{ currentReview.review }}
        </p>
        <div class="w-full h-1/6 md:h-2/6 pt-3 flex items-center justify-between">
          <div class="w-2/5 h-full flex">
            <img class="h-14 lg:h-16 rounded-full" alt="Persona" :src="require('@/assets/img/' + currentReview.image)" />
            <!--<img class="h-full rounded-full" alt="Persona" :src="require('@/assets/img/' + currentReview.image)" />-->

            <!-- <img class="h-full rounded-full" src="../../assets/img/Monica.jpeg" /> -->

            <h4
              class="ml-3 mt-3 lg:mb-4 text-xl font-bold flex flex-col justify-center text-white"
            >
              {{ currentReview.name }}
              <span class="w-20 md:w-auto text-xs sm:text-xl text-yellow-500" v-html="currentReview.stars"></span>
            </h4>
          </div>
          <i class="text-7xl mt-5 lg:mb-4 text-yellow-500 fas fa-quote-right icon"></i>
        </div>
        
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "ReviewsController",
  data() {
    return {
      reviews: [
        {
            'name': 'Mónica',
            'image': 'Monica.jpeg',
            'review': 'Estoy muy contenta con mi compra. El reloj llegó rápido y en excelentes condiciones. La atención al cliente fue excepcional. Sin embargo, sugeriría mejorar las opciones de seguimiento del pedido. En general, una experiencia positiva. Definitivamente volveré a comprar aquí y lo recomendaré a amigos y familiares.',
            'stars': '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>'
        },
        {
            'name': 'Marcela',
            'image': 'Marcela.jpeg',
            'review': '¡Increíble experiencia de compra! Mi reloj llegó puntualmente y superó mis expectativas. La calidad del producto es excepcional y el servicio al cliente fue impecable. La página web es fácil de navegar y ofrece una amplia variedad de opciones. ¡Definitivamente volveré a comprar aquí y lo recomendaré a todos!',
            'stars': '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>'
        },
        {
            'name': 'Leticia',
            'image': 'Leticia.jpeg',
            'review': 'La entrega fue puntual, pero el embalaje podría mejorar para proteger mejor el producto. El reloj cumple con las expectativas, aunque la descripción en el sitio web podría ser más detallada. La atención al cliente fue satisfactoria, pero hubo alguna confusión con el seguimiento del pedido. En general, una experiencia aceptable.',
            'stars': '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'
        },
        {
            'name': 'Marcos',
            'image': 'Marcos.jpeg',
            'review': 'La experiencia de compra fue decente. El reloj llegó a tiempo, pero la calidad del embalaje podría mejorar. El producto estaba en buen estado, aunque esperaba más detalles en la descripción del producto. En general, fue una experiencia aceptable.',
            'stars': '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'
        },
        {
            'name': 'Lorena',
            'image': 'Lorena.jpeg',
            'review': 'La entrega fue lenta y el embalaje llegó dañado, aunque el reloj estaba intacto. La calidad del producto no cumplió totalmente con mis expectativas, y la descripción en el sitio web fue engañosa. Hubo dificultades en el servicio al cliente.',
            'stars': '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>'
        }
      ],
      currentReviewIndex: 0
    };
  },
  computed: {
    currentReview() {
      return this.reviews[this.currentReviewIndex];
    }
  },
  methods: {
    nextReview() {
      this.currentReviewIndex = (this.currentReviewIndex + 1) % this.reviews.length;
      console.log(this.currentReview.image);
      console.log("Ruta de la imagen:", require("../../assets/img/" + this.currentReview.image));
    },
    prevReview() {
      this.currentReviewIndex = (this.currentReviewIndex - 1 + this.reviews.length) % this.reviews.length;
      console.log(this.currentReview.image);
    }
  }
};
</script>