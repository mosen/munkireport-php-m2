import Vue from 'vue';
import DirectoryServiceTable from './components/DirectoryServiceTable.vue';
import {ServerTable} from 'vue-tables-2';

Vue.use(ServerTable);

new Vue({
    el: '#table',
    template: '<DirectoryServiceTable/>',
    components: { DirectoryServiceTable }
});
