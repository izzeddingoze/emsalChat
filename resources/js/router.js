import {createWebHistory, createRouter} from 'vue-router';


import Messages from "./pages/Messages.vue";
import Login from "./pages/Login.vue";



export const router = new createRouter({
    history: createWebHistory(),
    routes: [
        {path: "/", component: Messages},
        {path: "/login", component: Login},
    ]
})

export  default  router
