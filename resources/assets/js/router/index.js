import Vue from 'vue';
import Router from 'vue-router';
import {routes} from '../app/index';

import ard from 'MrModules/ARD/assets/js/routes.js';
import bluetooth from 'MrModules/Bluetooth/assets/js/routes.js';
import certificate from 'MrModules/Certificate/assets/js/routes.js';
import ds from 'MrModules/DirectoryService/assets/js/routes';
import diskreport from 'MrModules/DiskReport/assets/js/routes';

Vue.use(Router);

const router = new Router({
  routes: [
    ...routes,
    ...ard,
    ...bluetooth,
    ...certificate,
    ...ds,
    ...diskreport
  ]
});

export default router;