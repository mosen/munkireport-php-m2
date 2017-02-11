import Vue from 'vue';
import VueI18n from 'vue-i18n';
import axios from 'axios';
import VueAxios from 'vue-axios';

import Root from './components/Root.vue';

Vue.use(VueI18n);
Vue.use(VueAxios, axios);

new Vue({
    el: '#root',
    template: '<Root/>',
    components: { Root }
});
