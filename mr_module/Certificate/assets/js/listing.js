import Vue from 'vue';
import CertificateTable from './components/CertificateTable.vue';
import {ServerTable} from 'vue-tables-2';

Vue.use(ServerTable);

new Vue({
    el: '#table',
    template: '<CertificateTable/>',
    components: { CertificateTable }
});
