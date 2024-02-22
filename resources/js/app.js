import './bootstrap.js';
import { createApp } from 'vue';
import App from './App.vue';
const app = createApp(App);
import router from "./router.js";
import authStore from "./store/auth.js";
import SWAlert from 'vue-sweetalert2';
app.component('app', App);
app.use(router)
app.use(authStore)
app.use(SWAlert);
app.mount('#app');

