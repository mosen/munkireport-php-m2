import Vue from 'vue';
import ExternalDisplaysTable from './components/ExternalDisplaysTable.vue';
import {ServerTable} from 'vue-tables-2';
import VueI18n from 'vue-i18n';

Vue.use(ServerTable);
Vue.use(VueI18n);

new Vue({
    el: '#table',
    template: '<ExternalDisplaysTable/>',
    components: { ExternalDisplaysTable }
});
