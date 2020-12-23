import { createRouter, createWebHistory } from 'vue-router';

import signin from './components/auth/signin.vue';
import dashboard from './components/dashboard/dashboard.vue';
import projects from './components/projects/projects.vue';
const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: signin,
            name: 'home',
            alias: '/'
        },
        {
            path: '/login',
            component: signin,
            name: 'login'
        },
        {
            path: '/dashboard',
            component: dashboard,
            name: 'dashboard'
        },
        {
            path: '/projects',
            component: projects,
            name: 'projects'
        }
    ]
});
export default router;
