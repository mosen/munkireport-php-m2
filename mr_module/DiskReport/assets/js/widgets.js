import Vue from 'vue';
import DiskReportWidget from './components/DiskReportWidget.vue';
import FileVaultStatusWidget from './components/FileVaultStatusWidget.vue';
import SMARTStatusWidget from './components/SMARTStatusWidget.vue';

Vue.component('widget-diskreport', DiskReportWidget);
Vue.component('widget-fvstatus', FileVaultStatusWidget);
Vue.component('widget-smartstatus', SMARTStatusWidget);