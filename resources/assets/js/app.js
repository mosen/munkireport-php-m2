import Vue from 'vue';
import VueI18n from 'vue-i18n';
import axios from 'axios';
import VueAxios from 'vue-axios';

import Root from './components/Root.vue';

import '../../../mr_module/Bluetooth/assets/js/widgets';
import '../../../mr_module/Backup2Go/assets/js/widgets';
import '../../../mr_module/Certificate/assets/js/widgets';
import '../../../mr_module/CrashPlan/assets/js/widgets';
import '../../../mr_module/DirectoryService/assets/js/widgets';
import '../../../mr_module/DiskReport/assets/js/widgets';
import '../../../mr_module/ManagedInstalls/assets/js/widgets';

import en from '../../../public/locale/en.json';

Vue.use(VueI18n);
Vue.use(VueAxios, axios);

Vue.locale('en', en);
Vue.config.lang = 'en';
Vue.config.fallbackLang = 'en';

new Vue({
    el: '#root',
    template: '<Root/>',
    components: { Root }
});
