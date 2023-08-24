<script setup>
    import { computed } from "vue";
    import { usePage } from "@inertiajs/vue3";
    const page = usePage();
    const auth = computed(()=>{return page.props.auth});
    const user = computed(()=>{return page.props.user});
    const pseudo = computed(()=>{
        const pseudo = page.props.user.pseudo.split('');
       const mety = pseudo.slice(0,6)
       let i = 0;
       return "@"+mety.join('')+"..."
       
    })
</script>
<template>
    <div class="transtion duration-1000 " :class="modes?'bg-indigo-950':'bg-purple-400'">
        <div class="flex justify-between px-8 items-center">
            <div class="">
                <Link href="">
                <p class="">
                    <span class="text-blue-400 font-bold px-1">Chat</span>
                    <span
                        class="border px-2 py-1 rounded-lg font-bold text-white bg-slate-600 border-blue-400">Generate</span>
                </p>
                </Link>
            </div>
            <div class="py-2 relative">
                <button 
                @click="mode"
                :class="modes?'fa-moon text-white':'fa-sun text-yellow-600'"
                class="fas  px-3"></button>
                <button
                @click.prevent="hello"
                 class="fas fa-list fa-lg hover:text-blue-400 text-purple-600"></button>
                <div class="absolute top-10 right-0 w-32">
                    <div class="rounded-md bg-indigo-400 shadow-lg shadow-indigo-950" v-if="menu">
                        <ul class="space-y-3 py-1 px-2">
                            <li>
                                <Link class="link flex justify-between items-center px-2">
                                    <span>{{ pseudo }}</span>
                                    <span class="fas fa-user-circle"></span>
                                </Link>
                            </li>
                            <li>
                                <Link class="link flex justify-between items-center px-2">
                                    <span>Parametre</span>
                                    <span class="fas fa-cogs hover:animate-spin"></span>
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('sortie',user)"
                                 class="link flex justify-between items-center px-2">
                                    <span>Sortie</span>
                                    <span class="fas fa-sign-in-alt transiton-all duration-100"></span>
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            menu:false,
            modes:false
        }
    },
    methods: {
        mode()
        {
            this.modes = !this.modes
        },
        hello()
        {
            this.menu=!this.menu
        }
    },
}
</script>
