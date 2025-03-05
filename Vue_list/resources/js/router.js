import { createRouter, createWebHistory } from 'vue-router';
import Home from './components/Home.vue';
import Test from './components/Test.vue';
// import Login from 'components/Login.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/test',
        name: 'test',
        component: Test
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    // Add more routes as needed
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;

