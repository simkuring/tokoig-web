require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import Axios from 'axios';
import router from './router'

import App from './components/App.vue';


const app = new Vue({
    router,
    el: '#app',
    render : h => h(App)
});
