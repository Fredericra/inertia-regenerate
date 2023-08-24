<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from "vue";

const page = usePage();
const admin = computed(() => {
    return page.props.admin;
})
const retour = computed(() => {
    return page.props.plus
})
const vazo = computed(() => {
    return page.props.left;
})

</script>
<template>
    <div>
        <div v-if="admin">
            <div class="py-4 px-5">
                <div class="bg-purple-400 rounded-t-2xl py-2 text-center shadow-lg shadow-purple-950">
                    <p class="text-white font-bold">Demande de reponse</p>
                </div>
                <div
                    class="outline rounded-br-2xl py-4 px-10 -outline-offset-4 h-[450px] y overflow-hidden overflow-y-auto  outline-2 outline-purple-400">
                    <div class="space-y-4">
                        <div class="rounded-md py-4" v-for="value in retour " :key="value.id">
                            <div class="relative" >
                                <button
                                @click.prevent="efface(value.id)"
                                 class="fas fa-window-close link fa-lg absolute top-0 left-0"></button>
                                <div class="grid grid-cols-12">
                                    <div class="col-span-6 col-end-8 px-2 py-1 rounded-bl-2xl rounded-tr-2xl bg-indigo-950 ">
                                        <p class="text-white font-bold">
                                            <span class="fas fa-user-circle"></span>
                                            <span class="">{{ value.admin.pseudo }}</span>
                                        </p>
                                    </div>
                                    <div class="col-span-9 text-white font-bold col-end-12 text-sm py-1 px-2 bg-purple-600 shadow-lg shadow-purple-950">
                                        {{ value.reponse }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-lg px-10 text-center py-2" v-else>
            <div class="bg-purple-400 rounded-t-2xl rounded-b-md shadow-md shadow-indigo-950">
                <p class="text-[22px] text-white font-bold">Reponse et maintenance</p>
            </div>
            <div class="px-2">
                <div class="h-[425px] y overflow-hidden overflow-y-auto border-4 rounded-bl-2xl border-purple-400">
                    <div class="px-2 py-2">
                        <div class="v" v-for="value in vazo" :key="value.id">
                            <div class="py-2 transition-all duration-1000 ">
                                <div class="grid grid-cols-12">
                                    <div
                                        class="col-span-8 text-left px-2 bg-indigo-900 rounded-tl-2xl rounded-br-2xl py-1 text-white">
                                        <p class="space-x-2">
                                            <span class="fas fa-user-circle"></span>
                                            <span class="">{{ value.admin.pseudo }} </span>
                                        </p>
                                        <p class="text-[12px] font-bold text-gray-400">{{ value.queston }} </p>
                                    </div>
                                    <div class="col-span-4"></div>
                                </div>
                                <div class="grid grid-cols-12 py-1">
                                    <div class="col-span-2"></div>
                                    <div
                                        class="col-span-10 text-left px-2 bg-purple-900 rounded-tl-2xl rounded-br-2xl py-1 text-white relative">
                                        <p class="space-x-2">
                                            <span class="fab fa-airbnbi"></span>
                                            <span class="font-bold">Regenerate ai </span>
                                            <button @click="efface(value.id)"
                                                class="absolute fas fa-window-close link fa-lg right-0 text-white"></button>
                                        </p>
                                        <p class="font-bold text-gray-400 text-[12px]">{{ value.reponse }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { usePage } from '@inertiajs/vue3';
export default {
    methods: {
        efface(key) {
            this.$inertia.post(route("efface"), {
                id: key
            })
            console.log(key);
        },

    },

}
</script>
