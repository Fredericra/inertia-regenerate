import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from 'ziggy';
import { Ziggy } from './ziggy';
import { Link } from '@inertiajs/vue3';
import MainLayout from "./Pages/MainLayout/Main.vue";
createInertiaApp({
title: title => `${title} - My App`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    const page =  pages[`./Pages/${name}.vue`]
    page.default.layout = page.default.layout || MainLayout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Link",Link)
      .use(Ziggy,ZiggyVue)
      .mixin({methods:{route}})
      .mount(el)
  },
})