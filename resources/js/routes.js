import { createRouter, createWebHistory } from 'vue-router';

import signin from './components/auth/signin.vue';
import dashboard from './components/dashboard/dashboard.vue';
import projects from './components/projects/projects.vue';
import projectDetails from './components/projects/project-details.vue';

import store from './store/store.js';
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
            name: 'dashboard',
            meta:{requireAuth:true} // as a middleware
        },
        {
            path: '/projects',
            component: projects,
            name: 'projects',
            meta:{requireAuth:true}
        },
        {
            path: '/projects/:id',
            component: projectDetails,
            name: 'project-details',
            meta:{requireAuth:true},
            props:true
        },
    ]
});

// middleware
router.beforeEach((to,from,next) => {
    if (to.matched.some(record => record.meta.requireAuth)) {
        if (!store.getters.authenticated) {
            next({name : 'login'})
        }else{
            next()
        }
    }else{
        next() // make sure always call next
    }

});

export default router;
