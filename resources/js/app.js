import './bootstrap';
import Vue from 'vue';
import Vuex from 'vuex';
import router from 'vue-router'
import Vuelidate from 'vuelidate'
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
    router,
    store: store,
    data: {
        userData: {
            email:'',
            password:'',
            satisfaction:'',
        },
        message: '',
        radioBoxOption: ''
    },
});

// Use Statements
app.use(Vuelidate);
app.use(router);
app.use(Vuex);
app.use(VueSweetalert2);
app.use(axios);
app.mount('#app');
