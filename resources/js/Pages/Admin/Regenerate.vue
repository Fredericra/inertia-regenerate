<script setup>
    import { usePage } from '@inertiajs/vue3';
    import { computed } from "vue";
    import { reactive } from "vue";
    import { router } from '@inertiajs/vue3';
    const page = usePage();
    const donne = computed(()=>{
        return page.props.donne;
    })

    const diso = computed(()=>{
        return page.props.errors;
    })
    const form = reactive({
        cle:null,
        reponse:null,
        autre:null
    })

    const tous = computed(()=>{
        router.post(route("ajouter"),form)
    })
</script>
<template>
    <div>
        <div class="media">
            <div class="col-span-6 py-12">
                <div class="text-center text-blue-400">
                    <p class="text-[22px]">Entre votre modification</p>
                </div>
                <div class="py-4 px-5">
                    <form @submit.prevent="tous" class="space-y-4">
                        <div class="relative">
                            <input v-model="form.cle" placeholder="entre le cle de question" type="text" class="input">
                            <i class="fas fa-pen-alt text-gray-400 absolute left-3 top-3"></i>
                            <div class="" v-if="diso.cle">
                                <p class="indent-12 text-[12px] text-red-400">{{ diso.cle }} </p>
                            </div>
                        </div>
                        <div class="relative">
                            <textarea v-model="form.reponse" class="input h-20 rounded"></textarea>
                            <i class="fas fa-pen-alt text-gray-400 absolute left-3 top-3"></i>
                            <div class="" v-if="diso.reponse">
                                <p class="indent-12 text-[12px] text-red-400">{{ diso.reponse }} </p>
                            </div>
                        </div>
                        <div class="relative">
                            <input v-model="form.autre" placeholder="entre le cle autre chose" type="text" class="input">
                            <i class="fas fa-pen-alt text-gray-400 absolute left-3 top-3"></i>
                            <div class="" v-if="diso.autre">
                                <p class="indent-12 text-[12px] text-red-400">{{ diso.autre.replace("autre","cle plus") }} </p>
                            </div>
                        </div>
                        <div class="flex justify-end py-2 px-4">
                            <button class="btn">Ajouter <i class="fas fa-plus"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-span-6">
                <div class="py-2 px-5">
                    <div class="" v-if="donne.length>0">
                        <div class="bg-indigo-950 py-2 shadow-md shadow-purple-950 rounded-t-2xl rounded-b-md text-center">
                            <p class="text-white font-bold">Liste donne</p>
                        </div>
                        <div class="h-[425px] y overflow-y-auto overflow-hidden outline outline-4 py-2 px-5 -outline-offset-4">
                            <div class="space-y-4" v-for="(value,index) in donne" :key="index">
                               <div class="mt-2 transition-all duration-1000 rounded-2xl  px-4 py-2" :class="index%2===0?'bg-yellow-600':'bg-purple-600'">
                                    <div class="flex justify-between items-center">
                                        <div class="">
                                            <p class="text-white font-bold text-sm">{{ value.reponse }}</p>
                                        </div>
                                        <div class="space-x-4">
                                            <Link>
                                                <i class="fas fa-edit fa-sm"></i>
                                            </Link>
                                            <Link>
                                                <i class="fas fa-trash fa-sm"></i>
                                            </Link>
                                        </div>
                                      
                                    </div>
                                    <div class="py-2 px-4">
                                            <p class="indent-10 text-[12px] text-white font-bold">{{ value.question }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="" v-else>
                        <div class="flex justify-center items-center">
                            <p class="indent-12 font-bold text-gray-400">aucun de registe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>