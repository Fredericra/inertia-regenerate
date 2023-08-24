<template>
    <div class="">
        <div class=" sticky top-0">
            <Head></Head>
        </div>
        <div class="media">
            <div class="col-span-4">
                <div class="py-4 px-5">
                    <div class="left">
                        <Left/>
                    </div>
                    
                </div>
            </div>
            <div class="col-span-8">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
<script>
import Left from '../Left.vue';
import Head from '../Head.vue';
export default {
    components:{
        Head,Left
    }
}
</script>
<style lang="">
    
</style>