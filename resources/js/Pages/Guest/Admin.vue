<script setup>
    import { reactive } from "vue";
    import { computed } from "vue";
    import { router } from "@inertiajs/vue3"
    import { usePage } from "@inertiajs/vue3"
    defineProps({errors:{type:Object,require:true}})
    const form = reactive({
        email:null,
        password:null,
    });
    const page = usePage();
    const preg = computed(()=>{
        const user = page.props.errors.password;
        const regex = RegExp(user);
        return regex.test("oublier")?true:false;
    })
    const connexion = computed(()=>{
        router.post(route('store.admin'),form);
    })
</script>
<template>
    <div>
        <div class="media">
            <div class="col-span-4"></div>
            <div class="col-span-4 ">
                <div class="py-10 px-14">
                    <div classs="w-full px-20">
                        <div class="bg-indigo-950 text-white font-bold text-center shadow-lg shadow-indigo-950 rounded-t-2xl">
                            <p class="text-[22px]">Admin</p>
                        </div>
                        <div class="border-2 border-indigo-950 rounded-b-2xl py-4 px-8">
                            <form @submit.prevent="connexion" class="space-y-3">
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
                                <div class="py-2">
                                    <label for="">
                                        <input type="checkbox" name="" id=""> <span class="font-serif px-4 text-[12px] text-slate-500">tous les droit des administeur son conserve</span>
                                    </label>
                                </div>
                                <div class="py-2 flex justify-between px-2 text-sm space-x-1">
                                    <div>
                                    <button class="btn">Connexion <i class="fas fa-user-plus"></i></button>
                                    </div>
                                    <div v-if="errors">
                                        <Link class="text-[12px] font-bold text-emerald-700 hover:text-indigo-700">vous ne pass admin</Link>
                                    </div>
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
           
        }
    },
    methods: {
        eye()
        {
            this.maso = !this.maso;
        },
       
    },
}
</script>
<style lang="">
    
</style>