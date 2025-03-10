import './bootstrap';
import { createApp } from 'vue';

import Swal from 'sweetalert2';

window.Swal = Swal;
const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    // onOpen: (toast) => {
    //     toast.addEventListener('mouseenter', Swal.stopTimer);
    //     toast.addEventListener('mouseleave', Swal.resumeTimer);
    // }
})
window.toast = toast;

import App from './components/App.vue';

import router from './router';

createApp(App).use(router).mount('#app');