require('./bootstrap');

window.Vue = require('vue').default;

import store from './store';

Vue.component('home', require('./components/Home.vue').default);

const app = new Vue({
    el: '#app',
    store
});
