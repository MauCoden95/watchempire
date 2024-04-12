<template>
    <header class="w-full h-20 bg-zinc-950">
        <div class="w-5/6 h-full m-auto flex items-center justify-between">
            <router-link to="/" class="logo text-2xl text-white">WatchEmpire <i class="fas fa-clock"></i></router-link>
        
            <nav class="w-2/4 h-full">
                <ul class="w-full h-full flex items-center justify-between">
                    <li>
                        <router-link to="/" class="text-base text-white hover:text-cyan-600">Inicio</router-link>
                    </li>

                    <li>
                        <router-link to="/" class="text-base text-white hover:text-cyan-600">Tienda</router-link>
                    </li>

                    <li>
                        <router-link to="/" class="text-base text-white hover:text-cyan-600">Categorías</router-link>
                    </li>

                    <li>
                        <router-link to="/" class="text-base text-white hover:text-cyan-600">Blog</router-link>
                    </li>

                    <li>
                        <router-link to="/" class="text-base text-white hover:text-cyan-600">Contacto</router-link>
                    </li>
                </ul>
            </nav>

            <button>
                <i class="fas fa-user text-white hover:text-cyan-600 duration-300 text-2xl"></i>
            </button>
        </div>
    </header>
</template>

<script>
export default {
    name: 'HeaderComponent',
}
</script>