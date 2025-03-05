import { createRouter, createWebHistory } from 'vue-router';
import productIndex from '../components/products/index.vue';

import productForm from '../components/products/form.vue';

import NotFound from '../components/NotFound.vue';
const routes = [    
    {
        path: '/',
        name: 'products.index',
        component: productIndex,
    },
    {
        path: '/products/create',
        name: 'products.create',
        component: productForm,
    },


    {
        path:'/:pathMatch(.*)*',
        name: 'NotFound',
        component: NotFound,
    }

]

const router = createRouter({
    history: createWebHistory(),
    routes 
    
});

export default router;