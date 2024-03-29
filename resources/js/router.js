import {createWebHistory, createRouter} from 'vue-router';


import Messages from "./pages/Messages.vue";
import Login from "./pages/Login.vue";
import authStore from "./store/auth.js";


export const router = new createRouter({
    history: createWebHistory(),
    routes: [
        {
            name: "messages",
            path: "/",
            component: Messages,
            meta: {
                title: "Mesajlar-EmsalChat",
                middleware: "auth"
            }
        },
        {
            name: "login",
            path: "/login",
            component: Login,
            meta: {
                title: "Giriş-EmsalChat",
                middleware: null
            }
        },
    ]
})


router.beforeEach(async (to, from, next) => {

    document.title = to.meta.title
    if (to.meta.middleware === "auth") {

        await authStore.dispatch('authenticate').then(r => {
            if (authStore.getters.authenticated) next()
            else next({name: "login"})

        })
    } else next()
})
export default router
