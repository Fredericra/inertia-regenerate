<script setup>
    import { usePage } from '@inertiajs/vue3';
    import { computed } from 'vue';
    import { Head } from "@inertiajs/vue3"
    import LayoutB from './LayoutB.vue';
    import LayoutA from "./LayoutA.vue"
    const page = usePage();
    const user = computed(()=>{
        return page.props.auth;
    });
    const menu = user?LayoutA:LayoutB;
</script>
<template lang="">
    <Head title="app"></Head>
    <component :is="menu"></component>
</template>
<script>
export default {
    
}
</script>
<style lang="">
    
</style>