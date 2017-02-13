import Vue from 'vue';
import VueI18n from 'vue-i18n';
import axios from 'axios';
import VueAxios from 'vue-axios';

import Root from './components/Root.vue';

import en from '../../../public/locale/en.json';

Vue.use(VueI18n);
Vue.use(VueAxios, axios);

Vue.config.lang = 'en';
Vue.config.fallbackLang = 'en';

new Vue({
    el: '#root',
    template: '<Root/>',
    components: { Root }
});
