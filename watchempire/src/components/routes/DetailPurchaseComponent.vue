<template>
    <div class="w-full min-h-[400px] bg-white">
            <PurchasesDetailTableComponent :products=productsBySale />
    </div>
</template>


<script>
import PurchasesDetailTableComponent from '../layouts/MyPurchases/PurchasesDetailTableComponent.vue';

export default {
  components: { PurchasesDetailTableComponent },
    

}
</script>