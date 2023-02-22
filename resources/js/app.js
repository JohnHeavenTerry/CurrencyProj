import './bootstrap';
import { createApp } from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import axios from 'axios'

// Require Vue
window.Vue = require('vue').default;

// Register Vue Components
Vue.component('form', require('./components/form.vue').default);

// Initialize Vue
const app = new Vue({
    el: '#app',
});

app.use(VueSweetalert2);
app.use(axios);
app.mount('#app');
