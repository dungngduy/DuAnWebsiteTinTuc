import { createRouter, createWebHistory } from "vue-router";
import admin from './admin';
import user from "./user";

const routes = [...admin, ...user];

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    const requiresRole = to.matched.some(record => record.meta.requiresRole);

    if (requiresAuth) {
        const user = JSON.parse(localStorage.getItem('user'));
        const role = localStorage.getItem('role');

        if (!user || !role) {
            next('/');
        } else {
            if (requiresRole && role !== to.meta.requiresRole) {
                next('/');
            } else {
                next();
            }
        }
    } else {
        next();
    }
});

export default router;
