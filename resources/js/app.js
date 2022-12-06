import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp, InertiaLink } from '@inertiajs/inertia-vue3'

const el = document.getElementById('app')

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue');
        
        return (await pages[`./Pages/${name}.vue`]()).default;
    },
    setup({ el, App, props, plugin }) {
        createApp({ 
            render: () => h(App, props) 
        }).use(plugin).component('inertia-link', InertiaLink).mount(el)
    },
})