import Vue from 'vue';
import PowerTable from './components/PowerTable.vue';
import {ServerTable} from 'vue-tables-2';
import VueI18n from 'vue-i18n';

Vue.use(ServerTable);
Vue.use(VueI18n);

new Vue({
    el: '#table',
    template: '<PowerTable/>',
    components: { PowerTable }
});
