<template>
    <section class="w-full min-h-[400px] bg-gray-200 py-14">
        <MyPurchasesTableComponent :sales=salesData />
    </section>
</template>



<script>
import MyPurchasesTableComponent from '../layouts/MyPurchases/MyPurchasesTableComponent.vue';

export default {
  components: { MyPurchasesTableComponent },
    name: 'MyPurchasesComponent',
    mounted(){
        
    }
}
</script>