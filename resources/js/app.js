import './bootstrap.js';
import { createApp } from 'vue';
import App from './App.vue';
const app = createApp(App);
import router from "./router.js";
import SWAlert from 'vue-sweetalert2';
app.component('app', App);
app.use(router)
app.use(SWAlert);
app.mount('#app');

