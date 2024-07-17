import { createRouter, createWebHistory } from "vue-router";
import admin from './admin';
import user from "./user";

const routes = [...admin, ...user];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
