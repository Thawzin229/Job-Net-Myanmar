import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import PrimeVue from 'primevue/config';
import Button from "primevue/button"
import ToastService from 'primevue/toastservice';
import 'primevue/resources/themes/aura-light-green/theme.css'

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .component("Link", Link,"Button",Button)
            .use(plugin)
            .use(ToastService)
            .use(PrimeVue)
            .mount(el)
    },
});
