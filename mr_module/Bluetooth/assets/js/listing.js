import Vue from 'vue';
import BluetoothTable from './components/BluetoothTable.vue';
import {ServerTable} from 'vue-tables-2';

Vue.use(ServerTable);

new Vue({
    el: '#table',
    template: '<BluetoothTable/>',
    components: { BluetoothTable }
});
