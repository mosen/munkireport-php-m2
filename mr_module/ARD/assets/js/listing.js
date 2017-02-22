import Vue from 'vue';
import ARDTable from './components/ARDTable.vue';
import {ServerTable} from 'vue-tables-2';

Vue.use(ServerTable);

new Vue({
    el: '#table',
    template: '<ARDTable/>',
    components: { ARDTable }
});
