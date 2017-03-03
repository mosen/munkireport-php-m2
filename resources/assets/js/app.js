import router from './router';
import store from './vuex';
import localforage from 'localforage';

localforage.config({
    driver: localforage.LOCALSTORAGE,
    storeName: 'munkireport'
});

require('./bootstrap');

import Vue from 'vue';
import vuexI18n from 'vuex-i18n';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueD3 from 'vue-d3';
import VueNVD3 from 'vue-nvd3';

Vue.use(vuexI18n.plugin, store);
Vue.use(VueAxios, axios);
Vue.use(VueD3);
Vue.use(VueNVD3);

Vue.component('app', require('./components/App.vue'));
Vue.component('navigation', require('./components/Navigation.vue'));

import en from '../../../public/locale/en.json';

Vue.i18n.add('en', en);
Vue.i18n.set('en');

// store.dispatch('auth/setToken').then(() => {
//     store.dispatch('auth/fetchUser').catch(() => {
//         store.dispatch('auth/clearAuth');
//         router.replace({ name: 'login' })
//     })
// }).catch(() => {
//     store.dispatch('auth/clearAuth')
// });

const app = new Vue({
    el: '#app',
    router,
    store
});
