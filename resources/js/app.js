require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex';
Vue.use(Vuex);

Vue.component('conversations-dashboard', require('./components/ConversationsDashboard.vue').default);
Vue.component('conversations', require('./components/Conversations.vue').default);
Vue.component('conversation', require('./components/Conversation.vue').default);



import store from './store/index.js'



const app = new Vue({
    el: '#app',
    store,
});
