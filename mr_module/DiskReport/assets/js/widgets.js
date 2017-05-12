import Vue from 'vue';
import DiskReportWidget from './components/DiskReportWidget.vue';
import FileVaultStatusWidget from './components/FileVaultStatusWidget.vue';
import SMARTStatusWidget from './components/SMARTStatusWidget.vue';

Vue.component('disk-widget-diskreport', DiskReportWidget);
Vue.component('disk-widget-fvstatus', FileVaultStatusWidget);
Vue.component('disk-widget-smartstatus', SMARTStatusWidget);