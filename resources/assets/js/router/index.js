import Vue from 'vue';
import Router from 'vue-router';
import {routes} from '../app/index';

import ard from 'MrModules/ARD/assets/js/routes';
import bluetooth from 'MrModules/Bluetooth/assets/js/routes';
import certificate from 'MrModules/Certificate/assets/js/routes';
import ds from 'MrModules/DirectoryService/assets/js/routes';
import diskreport from 'MrModules/DiskReport/assets/js/routes';
import display from 'MrModules/Display/assets/js/routes';
import munkireport from 'MrModules/MunkiReport/assets/js/routes';
import network from 'MrModules/Network/assets/js/routes';
import power from 'MrModules/Power/assets/js/routes';

Vue.use(Router);

const router = new Router({
  routes: [
    ...routes,
    ...ard,
    ...bluetooth,
    ...certificate,
    ...ds,
    ...diskreport,
    ...display,
    ...munkireport,
    ...network,
    ...power
  ]
});

export default router;