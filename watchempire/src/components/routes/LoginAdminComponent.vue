<template>
    <section class="w-screen h-screen bg-black flex items-center justify-evenly">
        <router-link to="/" class="logo text-md md:text-4xl lg:text-5xl text-white">WatchEmpire <i
                class="fas fa-clock"></i></router-link>

        <div class="w-2/6 h-auto bg-white rounded-lg px-3 py-3">
            <h2 class="text-center text-2xl my-6">Login Administrador</h2>
            <input type="text" id="first_name" class="bg-gray-300 my-5 border border-gray-700 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Correo electrónico" required />
            <input type="password" id="first_name" class="bg-gray-300 my-5 border border-gray-700 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contraseña" required />
            <input type="submit" id="first_name" class="bg-teal-600 hover:bg-teal-300 duration-300 mt-5 mb-6 border border-gray-700 text-gray-900 rounded-lg cursor-pointer block w-full p-2.5" value="Ingresar" />
        </div>
    </section>
</template>



<script>
export default {

}
</script>