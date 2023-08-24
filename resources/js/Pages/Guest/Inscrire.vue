<script setup>
    import { reactive } from "vue";
    import { computed } from "vue";
    import { router } from "@inertiajs/vue3"
    defineProps({errors:{type:Object,require:true}})
    const form = reactive({
        pseudo:null,
        email:null,
        password:null,
        confirm:null
    });
    const inscrire = computed(()=>{
        router.post(route('store.inscrire'),form);
    })
</script>
<template>
    <div>
        <div class="media">
            <div class="col-span-4"></div>
            <div class="col-span-4 ">
                <div class="py-10 px-14">
                    <div classs="w-full px-20">
                        <div class="bg-indigo-950 text-white font-bold text-center rounded-t-2xl">
                            <p class="text-[22px]">Inscrire</p>
                        </div>
                        <div class="border-2 border-indigo-950 rounded-b-2xl py-4 px-8">
                            <form @submit.prevent="inscrire" class="space-y-3">
                                <div class="relative px-">
                                    <input type="text"
                                    v-model="form.pseudo"
                                    placeholder="entre votre pseudo"
                                     class="input">
                                     <i class="fas fa-user-circle fa-lg text-gray-400 absolute top-5 left-3"></i>
                                     <div class="" v-if="errors.pseudo">
                                        <p class="text-[12px] text-red-600 font-bold indent-5">{{ errors.pseudo }} </p>
                                    </div>
                                </div>
                                <div class="relative px-">
                                    <input type="text"
                                    v-model="form.email"
                                    placeholder="entre votre email"
                                     class="input">
                                     <i class="fas fa-envelope fa-lg text-gray-400 absolute top-5 left-3"></i>
                                     <div class="" v-if="errors.email">
                                        <p class="text-[12px] text-red-600 font-bold indent-5">{{ errors.email }} </p>
                                    </div>
                                </div>
                                <div class="relative px-">
                                    <input 
                                    :type="maso?'text':'password'"
                                    v-model="form.password"
                                    placeholder="entre votre mots de pass"
                                     class="input">
                                     <i class="fas fa-user-lock fa-lg text-gray-400 absolute top-5 left-3"></i>
                                     <i
                                     @click.prevent="eye"
                                     :class="maso?'fa-eye':'fa-eye-slash'"
                                      class="far fa-lg text-gray-400 absolute top-5 right-2 cursor-pointer"></i>
                                      <div class="" v-if="errors.password">
                                        <p class="text-[12px] text-red-600 font-bold indent-5">{{ errors.password.replace("password","mots de pass") }} </p>
                                    </div>
                                </div>
                                <div class="relative px-">
                                    <input
                                    :type="maso1?'text':'password'"
                                    v-model="form.confirm"
                                    placeholder="entre votre confirmation"
                                     class="input">
                                     <i class="fas fa-user-lock fa-lg text-gray-400 absolute top-5 left-3"></i>
                                     <i
                                     @click.prevent="eye1" 
                                     :class="maso1?'fa-eye':'fa-eye-slash'"
                                     class="far fa-lg text-gray-400 absolute top-5 right-2 cursor-pointer"></i>
                                     <div class="" v-if="errors.confirm">
                                        <p class="text-[12px] text-red-600 font-bold indent-5">{{ errors.confirm.replace("confirm","confirmation") }} </p>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <label for="">
                                        <input type="checkbox" name="" id=""> <span class="font-serif px-4 text-slate-500">j'accepter le condition</span>
                                    </label>
                                </div>
                                <div class="py-2 flex justify-end px-2 text-sm">
                                    <button class="btn">Inscrire <i class="fas fa-user-plus"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-4"></div>
        </div>
    </div>
</template>
<script>
import LayoutA from '../MainLayout/LayoutA.vue';
export default {
    layout:LayoutA,
    data() {
        return {
            maso:false,
            maso1:false,
        }
    },
    methods: {
        eye()
        {
            this.maso = !this.maso;
        },
        eye1()
        {
            this.maso1 = !this.maso1;
        }
    },
}
</script>
<style lang="">
    
</style>