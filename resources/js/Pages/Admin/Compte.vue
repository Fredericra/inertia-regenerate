<script setup>
    import { computed } from "vue";
    import { usePage } from "@inertiajs/vue3";
    const page = usePage();
    const Admin = computed(()=>{
        return page.props.admin;
    })
</script>
<template>
    <div>
        <div class="py-4 px-8" v-if="Admin">
           <Regene/>
        </div>
        <div class="py-4 px-8" v-else>
            <Deco/>
        </div>
    </div>
</template>
<script>
import Deco from "./Deco.vue";
import LayoutB from '../MainLayout/LayoutB.vue';
import Regene from "../Admin/Regenerate.vue"
export default {
    layout:LayoutB,Deco
   
}
</script>
<style lang="">
    
</style>