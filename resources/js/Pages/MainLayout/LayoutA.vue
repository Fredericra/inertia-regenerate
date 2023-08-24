<template>
    <div>
        <div class="py-2 px-4 flex justify-between items-center bg-gray-400 shadow-md shadow-stone-800">
            <div class="">
                <Link href="/">
                <p class="">
                    <span class="text-blue-400 font-bold px-1">Chat</span>
                    <span
                        class="border px-2 py-1 rounded-lg font-bold text-white bg-slate-600 border-blue-400">Generate</span>
                </p>
                </Link>
            </div>
            <div class="">
                <div class="space-x-2 relative">
                    <button @click="revenu" class="fas fa-bars"></button>
                    <div class="absolute top-8 right-0 w-32">
                        <transition name="fade">
                            <div class="px-2 py-2 space-y-2 z-20 bg-purple-400 shadow-lg shadow-purple-950 transition duration-1000 rounded-lg relative"
                                :class="menu ? '' : 'hidden'">
                                <div class="absolute -top-10">
                                    <div class="w-2 h-32 rotate-[45deg] bg-teal-900 opacity-20"></div>
                                </div>
                                <div class="absolute -top-10 ">
                                    <div class="w-2 h-32 rotate-[125deg] bg-indigo-900 opacity-40 rounded-2xl"></div>
                                </div>
                                <div class="">
                                    <Link class="link" :href="route('connexion')">Connexion</Link>
                                </div>
                                <div class="">
                                    <Link class="link" :href="route('inscrire')">Inscrire</Link>
                                </div>
                                <div class="">
                                    <Link :href="route('admin')" class="link">Admin</Link>
                                </div>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>
        </div>
        <slot></slot>
    </div>
</template>
<script>
export default {
    data() {
        return {
            menu: false
        }
    },
    methods: {
        revenu() {
            this.menu = !this.menu
        }
    },
}
</script>
<style scoped>
    .fade-enter-active,.fade-leave-active{
        transition: all 2s ease-in-out;
    }
    .fade-enter,.fade-leave-to{
        transition: all 2s ease-in-out;
        
    }
</style>