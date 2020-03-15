require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex';
Vue.use(Vuex);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);



import store from './store/index.js'



const app = new Vue({
    el: '#app',
});
